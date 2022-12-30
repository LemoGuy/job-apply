<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="flex items-center justify-center min-h-screen p-5 bg-blue-100 min-w-screen">


        <!-- IF Else (Accept or Reject) -->

        @if ($request->status == 'Accepted')
            <!-- Accept Email -->

            <div class="max-w-xl p-8 text-center text-gray-800 bg-white shadow-xl lg:max-w-3xl rounded-3xl lg:p-12">
                <h3 class="text-2xl">Dear {{ $request->user->name }}</h3>
                <div class="flex justify-center">
                    <img src="{{ asset('imgs/logo.jpg') }}" class="w-24 h-24 text-green-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                    <div stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76">
                    </div>
                </div><br><br>

                <p>Congratulations! After reviewing your application for the {{ $request->job->title }} position at
                    {{ $request->company->name }}, we
                    are excited to move forward with the interview process as it appears that your qualifications match
                    the
                    job requirements,</p>

                <p>

                    The company’s recruiter will contact you SOON,
                </p>

                <p>

                    Thanks For choosing JOB APPLY website,
                </p>

                <p>

                    Warm Regards,
                </p>

                <div class="mt-4">

                    <p class="mt-4 text-sm">Job Apply
                    </p>
                </div>
            </div>
        @else
            <!-- Reject Email -->

            <div class="max-w-xl p-8 text-center text-gray-800 bg-white shadow-xl lg:max-w-3xl rounded-3xl lg:p-12">
                <h3 class="text-2xl">Dear {{ $request->user->name }}</h3>
                <div class="flex justify-center">
                    <img src="{{ asset('imgs/logo.jpg') }}" class="w-24 h-24 text-green-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" />
                    <div stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76">
                    </div>
                </div><br><br>

                <p>We would like to thank you for your application for the position {{ $request->job->title }} at
                    {{ $request->company->name }}, </p>

                <p>

                    We are sorry to inform you that your application has not been selected for further consideration.
                    After
                    careful review, we have decided to continue the process with a candidate with a closer match to the
                    requirements of the vacancy.
                </p>

                <p>

                    Thanks For choosing JOB APPLY website, we hope you have better luck in the future,
                </p>

                <p>

                    Warm Regards,
                </p>

                <div class="mt-4">

                    <p class="mt-4 text-sm">Job Apply
                    </p>
                </div>
            </div>
        @endif


    </div>
</body>

</html>
