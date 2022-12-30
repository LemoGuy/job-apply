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


                    <div class="flex justify-center">

                        <p class="mt-4 text-sm">Job Apply
                            <br> <a href="https://job-apply.devistan.com/">
                                <img src="{{ asset('imgs/logo.png') }}" style="height: 50px; width:50px;">

                            </a>
                        </p>

                    </div><br><br>
                </div>
            </div>
        @else
            <!-- Reject Email -->

            <div class="max-w-xl p-8 text-center text-gray-800 bg-white shadow-xl lg:max-w-3xl rounded-3xl lg:p-12">
                <h3 class="text-2xl">Dear {{ $request->user->name }}</h3>


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

                    <div class="flex justify-center">

                        <p class="mt-4 text-sm">Job Apply
                            <br><a href="https://job-apply.devistan.com/">
                                <img src="{{ asset('imgs/logo.png') }}" style="height: 50px; width:50px;">

                            </a>
                        </p>

                    </div><br><br>
                </div>
            </div>
        @endif


    </div>
</body>

</html>
