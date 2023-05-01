<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            display: flex;
            font-family: Manrope, sans-serif;
            font-size: 14px;
            font-weight: 500;
            color: #666666;
            border: solid;
            border-width: 4px;
            border-color: #2ac9bc;
        }

        .text-big {
            font-size: 18px;
        }

        .text-small {
            font-size: 14px;
        }

        .text-green {
            color: #2ac9bc
        }

        .text-bold {
            font-weight: bold;
        }

        .text-centered {
            text-align: center;
            align-items: center;
        }

        .space-left {
            margin-left: 6px;
        }

        .padding-top-medium {
            padding-top: 20px;
        }

        .padding-top-small {
            padding-top: 10px;
        }

        .padding-top-tiny {
            padding-top: 6px;
        }

        .row {
            display: flex;
            flex-direction: row;
        }

        .centered {
            align-content: center;
            justify-content: center;
        }

        .logo {
            height: 48px;
        }

        .container {
            padding: 24px;
            margin: 24px;
            border: solid;
            border-color: lightgray;
            border-width: 2px;
        }

        .icon {
            height: 14px;
            width: 14px;
        }

        .avatar {
            height: 64px;
            width: 64px;
        }
    </style>
</head>

<body>
    <div style="flex: 1; height: 100%; width: 100%">
        <div class="row centered logo padding-top-medium">
            <svg width="100%" height="100%" viewBox="0 0 212 30" fill="none">
                <path fill="black" fill-rule="evenodd" clip-rule="evenodd" d="M174.632 10.9082V22.8976C174.632 23.3648 174.25 23.7467 173.783 23.7467H172.012C171.545 23.7467 171.163 23.3648 171.163 22.8976V6.66655C171.163 6.19935 171.545 5.81738 172.012 5.81738H173.783C173.858 5.81738 173.967 5.82681 174.087 5.8732C174.202 5.91706 174.292 5.98069 174.362 6.0464L180.798 11.9458L187.205 6.04741C187.274 5.98137 187.366 5.91731 187.48 5.8732C187.601 5.82681 187.709 5.81738 187.785 5.81738H189.556C189.957 5.81738 190.427 6.14303 190.399 6.69343V22.8914C190.399 23.3586 190.017 23.7406 189.55 23.7406H187.779C187.312 23.7406 186.93 23.3587 186.93 22.8914V10.9124L181.375 16.0647C181.026 16.3991 180.532 16.3342 180.247 16.0968L180.232 16.0844L174.632 10.9082ZM68.3877 18.0143C68.3877 19.982 68.0484 21.2809 66.9993 22.3299L66.9976 22.3318C65.9476 23.3741 64.6196 23.7426 62.6839 23.7426H56.2048C54.2742 23.7426 52.9339 23.3823 51.8873 22.328C50.8479 21.2808 50.501 19.985 50.501 18.0143V6.71126C50.501 6.24397 50.8829 5.86204 51.3503 5.86204H53.1211C53.5884 5.86204 53.9704 6.24397 53.9704 6.71126V17.7029C53.9704 18.3998 54.0089 18.9085 54.093 19.2866C54.1753 19.6561 54.2911 19.8534 54.4141 19.9762C54.5366 20.099 54.7339 20.2146 55.1037 20.297C55.4814 20.3813 55.9901 20.4199 56.6873 20.4199H62.1951C62.8922 20.4199 63.401 20.3813 63.7791 20.297C64.1484 20.2146 64.3458 20.099 64.4687 19.9762C64.5913 19.8534 64.707 19.6561 64.7894 19.2866C64.8735 18.9085 64.9124 18.3998 64.9124 17.7029V6.71126C64.9124 6.24393 65.2944 5.86204 65.7613 5.86204H67.5325C67.9804 5.86204 68.3358 6.20235 68.3831 6.62755L68.3877 6.66926V18.0143ZM85.1776 16.9434L85.1801 16.9459L85.1831 16.9485C85.3973 17.1401 85.5537 17.3925 85.5537 18.4296C85.5537 19.444 85.3614 19.8183 85.1201 20.0117C84.8218 20.2511 84.2151 20.4199 82.8853 20.4199H72.9503C72.483 20.4199 72.101 20.8018 72.101 21.2691V22.8934C72.101 23.3607 72.483 23.7426 72.9503 23.7426H83.3738C85.2739 23.7426 86.588 23.3708 87.6511 22.3375C88.6504 21.3684 89.0227 20.1285 89.0227 18.4296C89.0227 16.7665 88.647 15.544 87.6625 14.5574C86.6206 13.4874 85.3251 13.141 83.3679 13.141H77.4934C76.1632 13.141 75.5548 12.9737 75.2556 12.7361C75.0165 12.5459 74.8251 12.1788 74.8251 11.1751C74.8251 10.1606 75.0173 9.78634 75.2582 9.5929C75.5569 9.3535 76.1637 9.18473 77.4934 9.18473H87.447C87.9139 9.18473 88.2959 8.80281 88.2959 8.33557V6.71126C88.2959 6.24402 87.9139 5.86204 87.447 5.86204H77.0108C75.1145 5.86204 73.7979 6.2261 72.7327 7.26786C71.7342 8.23695 71.362 9.47658 71.362 11.1751C71.362 12.8409 71.7482 14.1038 72.7344 15.0594L72.7356 15.0604C73.8038 16.0913 75.1158 16.4637 77.0108 16.4637H82.8853C84.4217 16.4637 84.843 16.638 85.1776 16.9434ZM145.811 20.4155V13.9858C145.811 13.5186 146.193 13.1366 146.66 13.1366H148.284C148.767 13.1366 149.087 13.5184 149.134 13.8919L149.139 13.9386V22.8951C149.139 23.3625 148.757 23.7443 148.29 23.7443H137.171C135.237 23.7443 133.906 23.3832 132.855 22.3317L132.853 22.3297C131.813 21.2825 131.467 19.9867 131.467 18.0161V11.5615C131.467 9.60981 131.807 8.31828 132.855 7.27036L132.857 7.26841C133.906 6.22623 135.235 5.85769 137.171 5.85769H146.678C147.145 5.85769 147.527 6.23966 147.527 6.70686V8.33117C147.527 8.79837 147.145 9.18038 146.678 9.18038H137.653C136.956 9.18038 136.447 9.21896 136.069 9.30326C135.7 9.38561 135.502 9.50126 135.379 9.62409C135.257 9.74688 135.141 9.94416 135.059 10.3137C134.974 10.6917 134.936 11.2004 134.936 11.8974V17.6985C134.936 18.3955 134.974 18.9041 135.059 19.2822C135.141 19.6517 135.257 19.849 135.379 19.9718C135.502 20.0946 135.7 20.2103 136.069 20.2926C136.447 20.3769 136.956 20.4155 137.653 20.4155H145.811ZM207.311 16.9434L207.314 16.9459L207.316 16.9485C207.53 17.14 207.687 17.3925 207.687 18.4296C207.687 19.444 207.495 19.8183 207.254 20.0117C206.955 20.2511 206.348 20.4199 205.019 20.4199H195.083C194.616 20.4199 194.234 20.8019 194.234 21.2691V22.8934C194.234 23.3605 194.616 23.7426 195.083 23.7426H205.507C207.407 23.7426 208.721 23.3709 209.784 22.3379C210.784 21.3687 211.156 20.1287 211.156 18.4296C211.156 16.7658 210.78 15.543 209.795 14.5562C208.754 13.495 207.462 13.141 205.501 13.141H199.627C198.296 13.141 197.688 12.9737 197.389 12.7361C197.15 12.5459 196.958 12.1788 196.958 11.1751C196.958 10.1606 197.15 9.78634 197.392 9.5929C197.69 9.3535 198.297 9.18473 199.627 9.18473H209.58C210.047 9.18473 210.429 8.80281 210.429 8.33557V6.71126C210.429 6.24402 210.047 5.86204 209.58 5.86204H199.144C197.248 5.86204 195.931 6.22606 194.866 7.26782C193.867 8.23686 193.495 9.47654 193.495 11.1751C193.495 12.8409 193.882 14.1038 194.868 15.0594L194.869 15.0605C195.937 16.0913 197.249 16.4637 199.144 16.4637H205.019C206.555 16.4637 206.976 16.638 207.311 16.9434ZM95.3324 20.4199H107.441C107.641 20.4199 107.866 20.4898 108.044 20.667C108.221 20.8442 108.291 21.0694 108.291 21.2691V22.8934C108.291 23.3606 107.909 23.7426 107.441 23.7426H92.7127C92.2453 23.7426 91.8634 23.3606 91.8634 22.8934V6.71126C91.8634 6.24406 92.2453 5.86204 92.7127 5.86204H107.441C107.909 5.86204 108.291 6.24406 108.291 6.71126V8.33557C108.291 8.80276 107.909 9.18473 107.441 9.18473H95.3324V13.141H103.38C103.848 13.141 104.23 13.5229 104.23 13.9901V15.59C104.23 16.0574 103.848 16.4392 103.38 16.4392H95.3324V20.4199ZM167.82 20.4199H155.712V16.4392H163.76C164.227 16.4392 164.609 16.0572 164.609 15.59V13.9901C164.609 13.523 164.227 13.141 163.76 13.141H155.712V9.18473H167.82C168.287 9.18473 168.67 8.80297 168.67 8.33557V6.71126C168.67 6.24381 168.287 5.86204 167.82 5.86204H153.092C152.624 5.86204 152.242 6.24406 152.242 6.71126V22.8934C152.242 23.3606 152.624 23.7426 153.092 23.7426H167.82C168.287 23.7426 168.67 23.3608 168.67 22.8934V21.2691C168.67 21.0693 168.6 20.8441 168.423 20.6669C168.245 20.4897 168.02 20.4199 167.82 20.4199ZM124.851 17.9463L128.793 22.3482L128.812 22.3736C128.892 22.4803 128.949 22.6086 128.973 22.7461C128.997 22.8835 128.999 23.1022 128.868 23.3195C128.766 23.4885 128.525 23.7406 128.133 23.7406H125.686C125.435 23.7406 125.224 23.6342 125.078 23.4898L125.055 23.4661L120.515 18.0753H114.292V22.8973C114.292 23.3692 113.905 23.7467 113.441 23.7467H111.654C111.191 23.7467 110.804 23.3692 110.804 22.8973V6.66681C110.804 6.19496 111.191 5.81738 111.654 5.81738H123.068C125.016 5.81738 126.357 6.17895 127.416 7.23195L127.418 7.23389C128.467 8.28351 128.817 9.5831 128.817 11.5604V12.3383C128.817 14.312 128.474 15.6146 127.417 16.6658C126.719 17.3643 125.894 17.7593 124.851 17.9463ZM125.336 12.0259V11.8789C125.336 10.419 125.154 9.86426 124.887 9.59886C124.763 9.47468 124.562 9.35797 124.188 9.27503C123.805 9.19023 123.29 9.15152 122.587 9.15152H114.304V14.7532H122.587C123.29 14.7532 123.805 14.7145 124.188 14.6297C124.562 14.5468 124.763 14.4301 124.887 14.3059C125.154 14.0405 125.336 13.4858 125.336 12.0259Z" fill="currentColor"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M42.2599 8.62882L33.7518 0.139405L8.4551 0.139404L0 8.62882L21.13 29.7587L42.2599 8.62882ZM31.1528 4.30755L28.2864 4.29188H25.4356L21.2164 8.51106L28.2864 15.581L35.3563 8.51106L31.1528 4.30755Z" fill="#2AC9BC"></path>
            </svg>
        </div>
        <div class="row centered padding-top-medium">
            <div class="text-green text-bold text-big">Your Morning Update</div>
        </div>
        <div class="container">
            <div>
                <div class="row text-centered">
                    <div class="text-green text-bold text-big">9:30 AM'</div>
                    <div class="text-bold text-small space-left"> - 10:00 AM |</div>
                    <div class="text-bold space-left text-big" style="text-decoration: underline">UserGems X Algolia</div>
                    <img class="icon space-left" src="{{ asset('images/yes.png') }}" alt="Attending">
                    <div class="text-small space-left">(30 min)</div>
                </div>
                <div class="row text-centered">
                    <div class="text-small">Joining from UserGems:</div>
                    <div class="text-bold text-small space-left">Joss</div>
                    <img class="icon space-left" src="{{ asset('images/yes.png') }}" alt="Attending">
                </div>
                <div class="row text-centered padding-top-small">
                    <div class="text-bold text-big" style="text-decoration: underline">Algolia</div>
                    <a href="TODO" class="space-left" style="display: flex;">
                        <img class="icon" src="{{ asset('images/linkedin.svg') }}" alt="Linkedin">
                    </a>
                    <img class="icon space-left" src="{{ asset('images/employees.png') }}" alt="Employees">
                    <div class="space-left">700</div>
                </div>
                <div class="row padding-top-small">
                    <div>
                        <img class="avatar" src="https://media.licdn.com/dms/image/C5603AQEWGd3Fh4f2Ow/profile-displayphoto-shrink_100_100/0/1580131621409?e=1688601600&v=beta&t=8fdz-4BajsMxyKx_EtGbTsYMvUrvBMUFb2wuXCdStPM" />
                    </div>
                    <div class="space-left">
                        <div class="row">
                            <div class="text-green text-bold">Joshua Lastname</div>
                            <img class="icon space-left" src="{{ asset('images/yes.png') }}" alt="Attending">
                            <a href="TODO" class="space-left" style="display: flex;">
                                <img class="icon" src="{{ asset('images/linkedin.svg') }}" alt="Linkedin">
                            </a>
                        </div>
                        <div class="text-bold text-small padding-top-tiny">GTM Chieff of Staff</div>
                        <div class="row text-centered padding-top-tiny">
                            <div class="text-bold">12th</div>
                            <div class="space-left">Meeting</div>
                            <div class="text-small space-left">| Met with Blaise (1x) & Christian (4x)</div>
                        </div>
                    </div>
                </div>
                <!-- REPEATED DELETE -->
                <div class="row padding-top-small">
                    <div>
                        <img class="avatar" src="https://media.licdn.com/dms/image/C5603AQEWGd3Fh4f2Ow/profile-displayphoto-shrink_100_100/0/1580131621409?e=1688601600&v=beta&t=8fdz-4BajsMxyKx_EtGbTsYMvUrvBMUFb2wuXCdStPM" />
                    </div>
                    <div class="space-left">
                        <div class="row">
                            <div class="text-green text-bold">Joshua Lastname</div>
                            <img class="icon space-left" src="{{ asset('images/yes.png') }}" alt="Attending">
                            <a href="TODO" class="space-left" style="display: flex;">
                                <img class="icon" src="{{ asset('images/linkedin.svg') }}" alt="Linkedin">
                            </a>
                        </div>
                        <div class="text-bold text-small padding-top-tiny">GTM Chieff of Staff</div>
                        <div class="row text-centered padding-top-tiny">
                            <div class="text-bold">12th</div>
                            <div class="space-left">Meeting</div>
                            <div class="text-small space-left">| Met with Blaise (1x) & Christian (4x)</div>
                        </div>
                    </div>
                </div>
                <div class="row padding-top-small">
                    <div>
                        <img class="avatar" src="https://media.licdn.com/dms/image/C5603AQEWGd3Fh4f2Ow/profile-displayphoto-shrink_100_100/0/1580131621409?e=1688601600&v=beta&t=8fdz-4BajsMxyKx_EtGbTsYMvUrvBMUFb2wuXCdStPM" />
                    </div>
                    <div class="space-left">
                        <div class="row">
                            <div class="text-green text-bold">Joshua Lastname</div>
                            <img class="icon space-left" src="{{ asset('images/yes.png') }}" alt="Attending">
                            <a href="TODO" class="space-left" style="display: flex;">
                                <img class="icon" src="{{ asset('images/linkedin.svg') }}" alt="Linkedin">
                            </a>
                        </div>
                        <div class="text-bold text-small padding-top-tiny">GTM Chieff of Staff</div>
                        <div class="row text-centered padding-top-tiny">
                            <div class="text-bold">12th</div>
                            <div class="space-left">Meeting</div>
                            <div class="text-small space-left">| Met with Blaise (1x) & Christian (4x)</div>
                        </div>
                    </div>
                </div>
                <div class="row padding-top-small">
                    <div>
                        <img class="avatar" src="https://media.licdn.com/dms/image/C5603AQEWGd3Fh4f2Ow/profile-displayphoto-shrink_100_100/0/1580131621409?e=1688601600&v=beta&t=8fdz-4BajsMxyKx_EtGbTsYMvUrvBMUFb2wuXCdStPM" />
                    </div>
                    <div class="space-left">
                        <div class="row">
                            <div class="text-green text-bold">Joshua Lastname</div>
                            <img class="icon space-left" src="{{ asset('images/no.png') }}" alt="Attending">
                            <a href="TODO" class="space-left" style="display: flex;">
                                <img class="icon" src="{{ asset('images/linkedin.svg') }}" alt="Linkedin">
                            </a>
                        </div>
                        <div class="text-bold text-small padding-top-tiny">GTM Chieff of Staff</div>
                        <div class="row text-centered padding-top-tiny">
                            <div class="text-bold">12th</div>
                            <div class="space-left">Meeting</div>
                            <div class="text-small space-left">| Met with Blaise (1x) & Christian (4x)</div>
                        </div>
                    </div>
                </div>
                <!-- END REPEATED DELETE -->
            </div>
        </div>
    </div>
</body>

</html>