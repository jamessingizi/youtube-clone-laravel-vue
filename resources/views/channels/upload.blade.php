@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <channel-uploads :channel="{{ $channel }}" inline-template>
                <div class="col-md-8">

                        <div class="card p-3 d-flex justify-content-center align-items-center" v-if="!selected">
                            <input type="file" ref="videos" id="video-files" style="display: none;" @change="upload" multiple>

                            <svg onclick="document.getElementById('video-files').click()" style="cursor: pointer" version="1.0" xmlns="http://www.w3.org/2000/svg"
                                width="80.000000pt" height="56.000000pt" viewBox="0 0 800.000000 563.000000"
                                preserveAspectRatio="xMidYMid meet">
                               <g transform="translate(0.000000,563.000000) scale(0.100000,-0.100000)"
                               fill="#000000" stroke="none">
                               <path d="M2950 5613 c-750 -15 -1503 -47 -1785 -74 -327 -31 -527 -114 -718
                               -298 -130 -125 -198 -243 -272 -472 -72 -222 -101 -414 -141 -944 -21 -281
                               -31 -1388 -15 -1721 23 -471 58 -847 97 -1024 50 -227 143 -463 229 -580 82
                               -111 225 -222 370 -288 210 -94 513 -135 1185 -162 1581 -62 3446 -52 4700 26
                               395 24 528 49 695 128 172 82 330 223 414 371 122 213 195 480 230 840 47 494
                               61 797 61 1395 0 612 -18 1000 -66 1465 -42 403 -164 747 -328 922 -145 155
                               -306 250 -512 303 -189 49 -822 85 -1884 110 -356 8 -1915 11 -2260 3z m1315
                               -2158 c578 -301 1053 -550 1057 -554 7 -6 -663 -356 -1954 -1023 l-188 -97 0
                               1120 c0 1063 1 1119 18 1111 9 -6 490 -256 1067 -557z"/>
                               </g>
                               </svg>
                               <p class="text-center">
                                   Upload Videos
                               </p>

                        </div>

                        <div class="card p-3" v-else>
                            <div class="my-4">
                                <div class="progress mb-3">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="d-flex justify-content-center align-items-center" style="height: 180px; color: white; font-size:18px; background: #ccc;">
                                        Loading Thumbnail...
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <h4 class="text-center">
                                        My awesome video
                                    </h4>
                                </div>
                            </div>

                        </div>
                    </div>

        </channel-uploads>

    </div>
</div>
@endsection
