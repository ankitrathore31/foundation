@extends('ngo.layout.master')
@section('content')
    <style>
        .print-red-bg {
            background-color: red !important;
            /* Bootstrap 'bg-danger' color */
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            color: white !important;
        }

        .print-h4 {
            background-color: red !important;
            color: white !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            font-size: 28px;
            word-spacing: 8px;
            text-align: center;
        }

        @media print {
            body * {
                visibility: hidden;
                font-size: 12px;

            }

            .print-card,
            .print-card * {
                visibility: visible;
            }

            .print-card {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                max-width: 210mm;
                /* A4 width */
                padding: 15mm;
                /* Print-friendly padding */
                box-sizing: border-box;
            }

            html,
            body {
                width: 210mm;
                height: 297mm;
                margin: 0;
                padding: 0;
                overflow: hidden;
            }

            .print-red-bg {
                background-color: red !important;
                /* Bootstrap 'bg-danger' color */
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                color: white !important;
            }

            .print-h4 {
                background-color: red !important;
                color: white !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                font-size: 28px;
                word-spacing: 8px;
                text-align: center;
            }

            @page {
                size: A4;
                margin: 20mm;
            }

            /* Optional: Hide any interactive or irrelevant UI */
            button,
            .btn,
            .no-print {
                display: none !important;
            }
        }
    </style>
    <div class="wrapper">
        <div class="d-flex justify-content-between align-record-centre mb-2 mt-3">
            <h5 class="mb-0">Donation Certificate</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light px-3 py-2 mb-0 rounded">
                    <li class="breadcrumb-record"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-record active" aria-current="page">Donation</li>
                </ol>
            </nav>
        </div>
        @if (session('success'))
            <div id="successMessage" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">
                {{-- <span data-lang="hi">दान पंजीकरण फॉर्म</span> --}}
                <span>Donation Certificate</span>
            </h5>
            <div>
                <button class="btn btn-sm btn-outline-primary" onclick="setLanguage('en')">English</button>
                <button class="btn btn-sm btn-outline-success" onclick="setLanguage('hi')">हिंदी</button>
            </div>
            <div class=" d-flex justify-content-between">
                {{-- <a href="{{ route('donation-list') }}" class="btn btn-success">Donation List</a> --}}
                <button onclick="window.print()" class="btn btn-primary">Print Certificate</button>
            </div>
        </div>
        <div class="container-fluid mt-2">
            <div class="card-body shadow rounded p-4 my-4 print-card">
                <div style="border: 8px solid #FF9933; padding: 4px;"> <!-- Outer Green -->
                    <div style="border: 6px solid white; padding: 2px;"> <!-- Middle White -->
                        <div style ="border: 8px solid #138808; padding: 4px;"> <!-- Inner Saffron -->
                            <div class="m-3">
                                <div class="text-center mb-4 border-bottom pb-2">
                                    <!-- Header -->
                                    <div class="row">
                                        <div class="col-sm-2 text-center text-md-start">
                                            <img src="{{ asset(ngo_info('logo')) }}" alt="Logo" width="100"
                                                height="100">
                                        </div>
                                        <div class="col-sm-10">
                                            <h4 class="print-h4"><b>
                                                    <span>{{ ngo_info('title') }}</span>
                                                </b></h4>
                                            <h6 style="color: blue;"><b>
                                                    <span>{{ ngo_info('address') }}</span>
                                                </b></h6>
                                            <p style="font-size: 14px; margin: 0;">
                                                <b>
                                                    <span>{{ ngo_info('website') }} | Email: {{ ngo_info('email') }}
                                                        | Mob:
                                                        {{ ngo_info('phone') }}</span>
                                                </b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-between mt-2">
                                    <div class="col-sm-4">
                                        <strong>Online Receipt No:</strong>
                                        {{ $donor->Onlinereceipt_no ?? 'Donation with OnlineCashfree' }}
                                    </div>

                                    <div class="col-sm-4">
                                        <h4 class="text-center print-red-bg p-1">
                                            <strong data-lang="en">DONATION CERTIFICATE</strong>
                                            <strong data-lang="hi">डोनेशन प्रमाण पत्र</strong>
                                        </h4>
                                    </div>
                                    <div class="col-sm-4 text-end">
                                        <strong>Donation Date:</strong>
                                        {{ \Carbon\Carbon::parse($donor->date)->format('d-m-Y') }}
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <strong>Offline Receipt No:</strong>
                                            {{ $donor->receipt_no ?? 'Donation with OnlineCashfree' }}
                                        </div>
                                    </div>
                                    <hr>
                                    <p style="font-size: 1.2rem; line-height: 1.8;" data-lang="hi">
                                        यह प्रमाणित किया जाता है कि
                                        <strong>दयाराम चैरिटेबल फाउंडेशन</strong> को
                                        <strong class="text-success">₹{{ $donor->amount }}</strong>
                                        की राशि <strong>{{ $donor->name }}</strong>
                                        पुत्र/पत्नी
                                        <strong>{{ $donor->gurdian_name ?? 'Donation with OnlineCashfree' }}</strong>,
                                        निवासी
                                        <strong>{{ $donor->address }}</strong>
                                        द्वारा दान स्वरूप प्राप्त हुई है। फाउंडेशन इस धनराशि का उपयोग
                                        गरीब, असहाय एवं निराश्रित लोगों के कल्याण हेतु करेगी। फाउंडेशन
                                        आपके उज्ज्वल भविष्य की कामना करती है एवं आपका हार्दिक आभार प्रकट करती है।
                                    </p>
                                    <p style="font-size: 1.2rem; line-height: 1.8;" data-lang="en">
                                        This is to certify that <strong>Dayaram Charitable Foundation</strong> has received a donation
                                        of
                                        <strong class="text-success">₹{{ $donor->amount }}</strong> from
                                        <strong>{{ $donor->name }}</strong>,
                                        S/O or W/O
                                        <strong>{{ $donor->gurdian_name ?? 'Donation with OnlineCashfree' }}</strong>,
                                        resident of
                                        <strong>{{ $donor->address }}</strong>. The Foundation will utilize this amount for
                                        the
                                        welfare
                                        of the poor, helpless and destitute. We sincerely thank you and wish you a bright
                                        future.
                                    </p>

                                    <div class="d-flex justify-content-between align-items-center mt-4">
                                        <div>
                                            <strong class="text-primary">Payment Method:</strong>
                                            <span
                                                class="text-success">{{ ucfirst($donor->payment_method) ?? 'Donation with OnlineCashfree' }}</span>
                                        </div>

                                        <div class="col-sm-5 text-center text-danger">
                                            @if (!empty($signatures['director']) && file_exists(public_path($signatures['director'])))
                                                <div id="directorSignatureBox" class="mt-2">
                                                    <p class="text-success no-print">Attached</p>
                                                    <img src="{{ asset($signatures['director']) }}"
                                                        alt="Director Signature" class="img" style="max-height: 100px;">
                                                    <br>
                                                    <button class="btn btn-danger btn-sm mt-2 no-print"
                                                        onclick="toggleDirector(false)">Remove</button>
                                                </div>

                                                <div id="directorShowBtnBox" class="mt-2 d-none no-print">
                                                    <button class="btn btn-primary btn-sm"
                                                        onclick="toggleDirector(true)">Attached
                                                        Signature</button>
                                                </div>
                                            @else
                                                <p class="text-muted mt-2 no-print">Not attached</p>
                                            @endif
                                            <strong>Digitally Signed By <br>
                                                DIRECTOR
                                            </strong><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function setLanguage(lang) {
                document.querySelectorAll('[data-lang]').forEach(el => {
                    el.style.display = el.getAttribute('data-lang') === lang ? 'inline' : 'none';
                });
            }
            window.onload = () => setLanguage('en'); // Set Hindi as default
        </script>
        <script>
            function numberToWordsEN(num) {
                const ones = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten',
                    'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'
                ];
                const tens = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

                if ((num = num.toString()).length > 9) return 'Overflow';
                let n = ('000000000' + num).slice(-9).match(/(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})/);
                if (!n) return '';

                const getWords = (num) => {
                    if (num < 20) return ones[num];
                    return tens[Math.floor(num / 10)] + (num % 10 ? ' ' + ones[num % 10] : '');
                };

                let str = '';
                if (+n[1]) str += getWords(+n[1]) + ' Crore ';
                if (+n[2]) str += getWords(+n[2]) + ' Lakh ';
                if (+n[3]) str += getWords(+n[3]) + ' Thousand ';
                if (+n[4]) str += ones[+n[4]] + ' Hundred ';
                if (+n[5]) str += getWords(+n[5]) + ' ';

                return str.trim() + ' Rupees Only';
            }


            function numberToWordsHI(num) {
                const ones = ['', 'एक', 'दो', 'तीन', 'चार', 'पांच', 'छह', 'सात', 'आठ', 'नौ', 'दस',
                    'ग्यारह', 'बारह', 'तेरह', 'चौदह', 'पंद्रह', 'सोलह', 'सत्रह', 'अठारह', 'उन्नीस'
                ];
                const tens = ['', '', 'बीस', 'तीस', 'चालीस', 'पचास', 'साठ', 'सत्तर', 'अस्सी', 'नब्बे'];

                const numToHindiWords = (n) => {
                    if (n === 0) return '';
                    if (n < 20) return ones[n];
                    if (n < 100) return tens[Math.floor(n / 10)] + (n % 10 !== 0 ? ' ' + ones[n % 10] : '');
                    if (n < 1000) return ones[Math.floor(n / 100)] + ' सौ' + (n % 100 !== 0 ? ' ' + numToHindiWords(n %
                        100) : '');
                    if (n < 100000) return numToHindiWords(Math.floor(n / 1000)) + ' हजार' + (n % 1000 !== 0 ? ' ' +
                        numToHindiWords(n % 1000) : '');
                    if (n < 10000000) return numToHindiWords(Math.floor(n / 100000)) + ' लाख' + (n % 100000 !== 0 ? ' ' +
                        numToHindiWords(n % 100000) : '');
                    return numToHindiWords(Math.floor(n / 10000000)) + ' करोड़' + (n % 10000000 !== 0 ? ' ' +
                        numToHindiWords(n % 10000000) : '');
                };

                return numToHindiWords(num).trim() + ' रुपये मात्र';
            }


            function updateAmountInWords() {
                const amount = parseInt(document.getElementById('amountInput').value);
                const lang = document.querySelector('[data-lang][style*="inline"]')?.getAttribute('data-lang') || 'hi';
                let words = '';

                if (!isNaN(amount)) {
                    if (lang === 'en') {
                        words = numberToWordsEN(amount);
                    } else {
                        words = numberToWordsHI(amount);
                    }
                }

                document.getElementById('amountWords').value = words;
            }
        </script>
    @endsection
