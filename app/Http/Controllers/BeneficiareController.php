<?php

namespace App\Http\Controllers;

use App\Models\academic_session;
use App\Models\BeneficiareFacilities;
use App\Models\BeneficiareSurvey;
use App\Models\Beneficiarie;
use App\Models\Category;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BeneficiareController extends Controller
{
    public function AddbeneficiarieList(Request $request)
    {
        $beneficiarie = Beneficiarie::where('status', 1)
            ->where('survey_status', 0)
            ->when($request->session_filter, function ($query, $session_filter) {
                return $query->where('session_date', $session_filter);
            })
            ->when($request->application_no, function ($query, $application_no) {
                return $query->where('application_no', $application_no);
            })
            ->when($request->name, function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->when($request->state, function ($query, $state) {
                return $query->where('state', $state);
            })
            ->when($request->district, function ($query, $district) {
                return $query->where('district', $district);
            })
            ->when($request->block, function ($query, $block) {
                return $query->where('block', 'like', '%' . $block . '%');
            })
            ->when($request->village, function ($query, $village) {
                return $query->where('village', 'like', '%' . $village . '%');
            })
            ->get();

        $data = academic_session::all();
        $states = config('states');
        return view('ngo.beneficiarie.beneficiarie-list', compact('beneficiarie', 'data', 'states'));
    }

    public function viewbeneficiarie($id)
    {

        $beneficiarie = beneficiarie::find($id);
        return view('ngo.beneficiarie.view-beneficiarie', compact('beneficiarie'));
    }

    public function addSurvey($id)
    {

        $beneficiarie = beneficiarie::find($id);
        $staff = Staff::get();
        $categories = Category::orderBy('category', 'asc')->get();
        return view('ngo.beneficiarie.add-survey', compact('beneficiarie', 'staff', 'categories'));
    }

    public function storeSurvey(Request $request, $id)
    {
        $request->validate([
            'beneficiarie_id' => 'required',
            'survey_details' => 'required|string',
            'survey_date' => 'required',
            'bene_category' => 'required',
        ]);

        $survey = new BeneficiareSurvey();
        $survey->beneficiarie_id = $request->input('beneficiarie_id');
        $survey->survey_details = $request->input('survey_details');
        $survey->survey_officer = $request->input('survey_officer');
        $survey->bene_category  = $request->input('bene_category');
        $survey->survey_date = Carbon::parse($request->input('survey_date'));
        $survey->surveyfacility_status = $request->input('surveyfacility_status', []);
        $survey->save();

        beneficiarie::where('id', $id)->update(['survey_status' => 1]);

        return redirect()->route('beneficiarie-facilities')->with('success', 'Beneficiare added successfully.');
    }


    public function SurveyList(Request $request)
    {

        $surveys = BeneficiareSurvey::with('beneficiarie')
            ->first()
            ->orderBy('id', 'asc');

        if ($request->filled('session_filter')) {
            $surveys->where('session_date', $request->session_filter);
        }

        if ($request->filled('application_no')) {
            $surveys->whereHas('beneficiarie', function ($query) use ($request) {
                $query->where('application_no', $request->application_no);
            });
        }

        if ($request->filled('name')) {
            $surveys->whereHas('beneficiarie', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->name . '%');
            });
        }

        if ($request->filled('state')) {
            $surveys->whereHas('beneficiarie', function ($query) use ($request) {
                $query->where('state', $request->state);
            });
        }

        if ($request->filled('district')) {
            $surveys->whereHas('beneficiarie', function ($query) use ($request) {
                $query->where('district', $request->district);
            });
        }

        if ($request->filled('block')) {
            $surveys->whereHas('beneficiarie', function ($query) use ($request) {
                $query->where('block', 'like', '%' . $request->block . '%');
            });
        }

        if ($request->filled('bene_category')) {
            $surveys->whereHas('beneficiarie', function ($query) use ($request) {
                $query->where('bene_category', $request->bene_category);
            });
        }

        if ($request->filled('village')) {
            $surveys->whereHas('beneficiarie', function ($query) use ($request) {
                $query->where('village', 'like', '%' . $request->village . '%');
            });
        }

        // Fetch the filtered results
        $surveys = $surveys->get();
        $staff = Staff::get();
        // Pass sessions data to the view for filter dropdown
        $data = academic_session::all();
        $states = config('states');
        $category = Category::orderBy('category', 'asc')->get();
        return view('ngo.beneficiarie.survey-list', compact('surveys', 'data', 'states', 'category', 'staff'));
    }

    public function showbeneficiariesurvey($beneficiarie_id, $survey_id)
    {
        $survey = BeneficiareSurvey::where('beneficiarie_id', $beneficiarie_id)
            ->where('id', $survey_id)
            ->with('beneficiarie')
            ->firstOrFail();

        $beneficiarie = beneficiarie::with('surveys')->find($beneficiarie_id);
        return view('ngo.beneficiarie.show-survey', compact('beneficiarie', 'survey'));
    }

    public function deletesurvey($beneficiarie_id, $survey_id)
    {
        $survey = BeneficiareSurvey::where('beneficiarie_id', $beneficiarie_id)
            ->where('id', $survey_id)
            ->firstOrFail();

        $survey->delete();
        Beneficiarie::where('id', $beneficiarie_id)->update(['survey_status' => 0]);
        return redirect()->back()->with('success', 'Survey deleted successfully');
    }

    public function addbeneficiarieFacilities($beneficiarie_id, $survey_id)
    {
        $survey = BeneficiareSurvey::where('beneficiarie_id', $beneficiarie_id)
            ->where('id', $survey_id)
            ->with('beneficiarie')
            ->firstOrFail();
        $beneficiarie = beneficiarie::with('surveys')->where('status', 1)->find($beneficiarie_id);
        $session = academic_session::all();
        $category = Category::orderBy('category', 'asc')->get();
        return view('ngo.beneficiarie.add-facilities', compact('session', 'beneficiarie', 'survey', 'category'));
    }

    public function storebeneficiariefacilities(Request $request, $beneficiarie_id, $survey_id)
    {
        $request->validate([
            'facilities_category' => 'required',
            'facilities' => 'required',
            'session' => 'required',
        ]);

        $facilities = new BeneficiareFacilities();
        $facilities->beneficiarie_id = $request->beneficiarie_id;
        $facilities->survey_id = $request->survey_id;
        $facilities->facilities_category = $request->input('facilities_category');
        $facilities->academic_session = $request->input('session');
        $facilities->facilities = $request->input('facilities');
        $facilities->facilities_status = 1;
        $facilities->save();

        return redirect()->route('beneficiarie-facilities-list')->with('success', 'Facility added successfully');
    }

    public function editFacilities($beneficiarie_id, $survey_id)
    {
        $survey = BeneficiareFacilities::where('beneficiarie_id', $beneficiarie_id)
            ->where('id', $survey_id)
            ->with('beneficiarie')
            ->firstOrFail();
        $beneficiarie = beneficiarie::with('surveys')->find($beneficiarie_id);
        $session = academic_session::all();
        $category = Category::orderBy('category', 'asc')->get();
        return view('ngo.beneficiarie.edit-facilities', compact('session', 'beneficiarie', 'survey', 'category'));
    }

    public function updateFacilities(Request $request, $beneficiarie_id, $facility_id)
    {

        try {
            $facilities = BeneficiareFacilities::where('beneficiarie_id', $beneficiarie_id)
                ->where('id', $facility_id)
                ->with('beneficiarie')
                ->firstOrFail();

            $facilities->facilities_category = $request->input('facilities_category');
            $facilities->academic_session = $request->input('session');
            $facilities->facilities = $request->input('facilities');
            $facilities->save();

            return redirect()->route('beneficiarie-facilities-list')->with('success', 'Facilities Update successfully');
        } catch (\Throwable $th) {
            return back()->withInput()->withErrors(['error' => 'Failed to update facilities.']);
        }
    }


    public function beneficiarieFacilitiesList(Request $request)
    {
        $query = Beneficiarie::with([
            'surveys' => function ($q) use ($request) {
                $q
                    ->orderBy('created_at', 'asc');

                if ($request->session_filter) {
                    $q->where('academic_session', $request->session_filter);
                }

                if ($request->bene_category) {
                    $q->where('bene_category', $request->bene_category);
                }

                if ($request->survey_officer) {
                    $q->where('survey_officer', $request->survey_officer);
                }

                $q->with(['facilities' => function ($f) use ($request) {
                    $f->where('facilities_status', 1)
                        ->where('status', '0');

                    if ($request->facilities_category) {
                        $f->where('facilities_category', $request->facilities_category);
                    }
                }]);
            }
        ])
            ->whereHas('surveys', function ($q) use ($request) {
                if ($request->session_filter) {
                    $q->where('academic_session', $request->session_filter);
                }

                if ($request->bene_category) {
                    $q->where('bene_category', $request->bene_category);
                }

                if ($request->survey_officer) {
                    $q->where('survey_officer', $request->survey_officer);
                }
            })
            ->where('status', 1)
            ->orderBy('id', 'desc');

        $beneficiarie = $query->get();

        $data = academic_session::all();
        $category = Category::orderBy('category', 'asc')->get();
        $staff = Staff::get();

        return view('ngo.beneficiarie.facilities-list', compact('data', 'beneficiarie', 'category', 'staff'));
    }


    public function showbeneficiariefacilities($beneficiarie_id, $survey_id, $facilities_id)
    {
        // Load the survey with its facilities and beneficiary
        $survey = BeneficiareSurvey::with(['facilities', 'beneficiarie'])
            ->where('id', $facilities_id)
            ->where('beneficiarie_id', $beneficiarie_id)
            ->where('id', $survey_id)
            ->firstOrFail();

        $beneficiarie = Beneficiarie::findOrFail($beneficiarie_id);

        return view('ngo.beneficiarie.show-facilities', compact('beneficiarie', 'survey'));
    }


    public function deletefacilities($beneficiarie_id, $survey_id)
    {
        $survey = BeneficiareFacilities::where('beneficiarie_id', $beneficiarie_id)
            ->where('id', $survey_id)
            ->with('beneficiarie')
            ->firstOrFail();

        // beneficiarie::where('id', $beneficiarie_id)->update(['survey_status' => 0]);

        return redirect()->back()->with('success', 'Facilities Delete Successfully');
    }

    public function distributebeneficiarieFacilities($beneficiarie_id, $facility_id)
    {
        $facility = BeneficiareFacilities::where('beneficiarie_id', $beneficiarie_id)
            ->where('id', $facility_id)
            ->firstOrFail();

        $beneficiarie = Beneficiarie::with('surveys')->where('status', 1)->find($beneficiarie_id);

        return view('ngo.beneficiarie.distribute-facilities', compact('beneficiarie', 'facility'));
    }


    public function storedistributefacilities(Request $request, $beneficiarie_id, $facility_id)
    {
        $request->validate([
            'distribute_date' => 'required|date',
            'status' => 'required',
            'distribute_place' => 'required|string',
            'pending_reason' => 'required_if:status,Pending',
        ]);

        try {
            $distribute = BeneficiareFacilities::where('beneficiarie_id', $beneficiarie_id)
                ->where('id', $facility_id)
                ->firstOrFail();

            $distribute->distribute_date  = $request->distribute_date;
            $distribute->distribute_place = $request->distribute_place;
            $distribute->status           = $request->status;

            if ($request->status === 'Pending') {
                $distribute->pending_reason = $request->pending_reason;
            } else {
                $distribute->pending_reason = null;
            }

            $distribute->save();

            return $request->status === 'Distributed'
                ? redirect()->route('distributed-list')->with('success', 'Distributed successfully')
                : redirect()->route('pending-distribute-list')->with('success', 'Facilities Now Pending');
        } catch (\Throwable $th) {
            \Log::error('Distribution update failed', ['error' => $th->getMessage()]);
            return back()->withInput()->withErrors(['error' => 'Failed to update distribution.']);
        }
    }


    public function EditDistributeFacilities($beneficiarie_id, $facilities_id)
    {
        $facilities = BeneficiareFacilities::where('beneficiarie_id', $beneficiarie_id)
            ->where('id', $facilities_id)
            ->with('beneficiarie')
            ->firstOrFail();
        $beneficiarie = beneficiarie::with('surveys')->where('status', 1)->find($beneficiarie_id);
        return view('ngo.beneficiarie.edit-distribute-facilities', compact('facilities', 'beneficiarie'));
    }



    public function updateDistributeFacilities(Request $request, $beneficiarie_id, $facility_id)
    {
        $request->validate([
            'distribute_date' => 'required|date',
            'status' => 'required',
            'distribute_place' => 'required|string',
            'pending_reason' => 'required_if:status,Pending',
        ]);

        try {
            $distribute = BeneficiareFacilities::where('beneficiarie_id', $beneficiarie_id)
                ->where('id', $facility_id)
                ->firstOrFail();

            $distribute->distribute_date = Carbon::parse($request->input('distribute_date'));
            $distribute->distribute_place = $request->input('distribute_place');
            $distribute->status = $request->input('status');
            $distribute->pending_reason = $request->input('status') === 'Pending'
                ? $request->input('pending_reason')
                : null;

            $distribute->save();

            if ($distribute->status === 'Distributed') {
                return redirect()->route('distributed-list')->with('success', 'Facilities successfully distributed.');
            } else {
                return redirect()->route('pending-distribute-list')->with('success', 'Facilities marked as pending.');
            }
        } catch (\Throwable $th) {
            return back()->withInput()->withErrors(['error' => 'Failed to update distribution.']);
        }
    }

    public function distributefacilities(Request $request)
    {
        $query = Beneficiarie::with(['facilities' => function ($q) use ($request) {
            $q->where('status', 'Distributed')
                ->orderBy('created_at', 'asc');

            if ($request->session_filter) {
                $q->where('session_date', $request->session_filter);
            }

            if ($request->category_filter) {
                $q->where('facilities_category', $request->category_filter);
            }

            if ($request->distribute_date) {
                $q->where('distribute_date', $request->distribute_date);
            }

            if ($request->bene_category) {
                $q->where('bene_category', $request->bene_category);
            }
        }])->where('status', 1);

        // Filter by block, district, and state
        if ($request->filled('block')) {
            $query->where('block', 'like', '%' . $request->block . '%');
        }

        if ($request->filled('district')) {
            $query->where('district', $request->district);
        }

        if ($request->filled('state')) {
            $query->where('state', $request->state);
        }

        $query->whereHas('facilities', function ($q) use ($request) {
            $q->where('status', 'Distributed');

            if ($request->session_filter) {
                $q->where('session_date', $request->session_filter);
            }

            if ($request->category_filter) {
                $q->where('facilities_category', $request->category_filter);
            }

            if ($request->distribute_date) {
                $q->where('distribute_date', $request->distribute_date);
            }

            if ($request->bene_category) {
                $q->where('bene_category', $request->bene_category);
            }
        });

        $beneficiarie = $query->orderBy('id', 'desc')->get();

        $data = academic_session::all();
        $category = Category::orderBy('category', 'asc')->get();

        return view('ngo.beneficiarie.distributed-list', compact('beneficiarie', 'data', 'category'));
    }

    public function pendingfacilities(Request $request)
    {
        $query = Beneficiarie::with(['facilities' => function ($q) use ($request) {
            $q->where('status', 'Pending')
                ->orderBy('created_at', 'asc');

            if ($request->session_filter) {
                $q->where('session_date', $request->session_filter);
            }

            if ($request->category_filter) {
                $q->where('facilities_category', $request->category_filter);
            }

            if ($request->distribute_date) {
                $q->where('distribute_date', $request->distribute_date);
            }

            if ($request->bene_category) {
                $q->where('bene_category', $request->bene_category);
            }
        }])->where('status', 1);

        // Filter by block, district, and state
        if ($request->filled('block')) {
            $query->where('block', 'like', '%' . $request->block . '%');
        }

        if ($request->filled('district')) {
            $query->where('district', $request->district);
        }

        if ($request->filled('state')) {
            $query->where('state', $request->state);
        }

        $query->whereHas('facilities', function ($q) use ($request) {
            $q->where('status', 'Pending');

            if ($request->session_filter) {
                $q->where('session_date', $request->session_filter);
            }

            if ($request->category_filter) {
                $q->where('facilities_category', $request->category_filter);
            }

            if ($request->distribute_date) {
                $q->where('distribute_date', $request->distribute_date);
            }

            if ($request->bene_category) {
                $q->where('bene_category', $request->bene_category);
            }
        });

        $beneficiarie = $query->orderBy('id', 'desc')->get();

        // For dropdowns/filters
        $data = academic_session::all();
        $category = Category::orderBy('category', 'asc')->get();

        return view('ngo.beneficiarie.pending-facilities-list', compact('beneficiarie', 'data', 'category'));
    }

    public function allbeneficiarielist(Request $request)
    {
        $query = Beneficiarie::with(['surveys' => function ($q) use ($request) {
            $q->where('status', 'Distributed')->orderBy('created_at', 'asc');

            if ($request->session_filter) {
                $q->where('academic_session', $request->session_filter);
            }

            if ($request->category_filter) {
                $q->where('facilities_category', $request->category_filter);
            }
        }])->where('status', 1);

        // Apply state, district, block filters
        if ($request->filled('state')) {
            $query->where('state', $request->state);
        }

        if ($request->filled('district')) {
            $query->where('district', $request->district);
        }

        if ($request->filled('block')) {
            $query->where('block', 'like', '%' . $request->block . '%');
        }

        // Only get beneficiaries with at least one matching survey
        $query->whereHas('surveys', function ($q) use ($request) {
            $q->where('status', 'Distributed')->orderBy('created_at', 'asc');

            if ($request->session_filter) {
                $q->where('academic_session', $request->session_filter);
            }

            if ($request->category_filter) {
                $q->where('facilities_category', $request->category_filter);
            }
            if ($request->bene_category) {
                $q->where('bene_category', $request->bene_category);
            }
        });

        $beneficiarie = $query->orderBy('id', 'desc')->get();

        // Filters for the view
        $data = academic_session::all();
        $categories = Beneficiarie_Survey::select('facilities_category')->distinct()->pluck('facilities_category');

        return view('ngo.beneficiarie.all-beneficiarie-list', compact('beneficiarie', 'data', 'categories'));
    }

    public function showbeneficiariereport($beneficiarie_id, $facility_id)
    {
        $facility = BeneficiareFacilities::where('beneficiarie_id', $beneficiarie_id)
            ->where('id', $facility_id)
            ->with('beneficiarie')
            ->firstOrFail();

        $beneficiarie = Beneficiarie::with('facilities')
            ->where('status', 1)
            ->findOrFail($beneficiarie_id);

        return view('ngo.beneficiarie.show-beneficiarie-report', compact('beneficiarie', 'facility'));
    }


    public function surveyrecivedlist()
    {
        $beneficiarie = beneficiarie::with('surveys')->where('status', 1)->where('survey_status', 1)->get();

        return view('ngo.beneficiarie.survey-received-list', compact('beneficiarie'));
    }
}
