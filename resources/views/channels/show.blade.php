@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header d-flex justify-content-between">
                {{ $channel->name }}

                <a href="">Upload Videos</a>
            </div>

                <div class="card-body">
                <form action="{{route('channels.update',$channel->id)}}" method="POST"
                    enctype="multipart/form-data" id="update-channel-form">

                    @csrf
                    @method('PATCH')

                    <div class="form-group row justify-content-center">
                        <div class="channel-avatar">

                            @if($channel->editable())

                            <div class="channel-avatar-overlay" onclick="document.getElementById('image').click()">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="50.000000pt" height="50.000000pt" viewBox="0 0 700.000000 700.000000" preserveAspectRatio="xMidYMid meet">
                                        <metadata>
                                        Created by potrace 1.12, written by Peter Selinger 2001-2015
                                        </metadata>
                                        <g transform="translate(0.000000,700.000000) scale(0.100000,-0.100000)" fill="#FFFFFF" stroke="none">
                                        <path d="M3275 6421 c-111 -32 -203 -88 -301 -186 -105 -104 -137 -156 -214
                                        -350 l-56 -140 -370 0 -369 0 -5 91 c-6 100 -20 132 -73 164 -31 19 -54 20
                                        -557 20 -506 0 -526 -1 -558 -20 -59 -36 -72 -71 -72 -191 l0 -106 -48 -18
                                        c-337 -127 -576 -409 -636 -755 -15 -87 -17 -237 -14 -1680 l3 -1585 23 -85
                                        c29 -108 98 -254 161 -339 56 -75 150 -168 228 -224 75 -55 226 -123 329 -149
                                        l89 -23 2670 0 2670 0 85 23 c95 26 244 93 315 142 72 49 179 154 235 230 65
                                        88 134 234 162 346 l23 89 0 1615 0 1615 -23 89 c-46 180 -146 351 -281 479
                                        -88 83 -141 119 -255 173 -154 73 -224 86 -501 93 l-239 6 -56 140 c-76 192
                                        -109 245 -214 351 -69 69 -110 100 -171 131 -148 76 -100 73 -1061 72 -783 0
                                        -864 -2 -919 -18z m1834 -295 c66 -34 164 -125 197 -182 14 -23 56 -121 94
                                        -218 75 -193 87 -217 127 -243 24 -16 63 -19 323 -24 271 -5 301 -7 365 -28
                                        125 -41 203 -88 295 -181 94 -94 142 -172 182 -300 l23 -75 0 -1585 0 -1585
                                        -23 -75 c-40 -128 -88 -206 -182 -300 -94 -94 -172 -142 -300 -182 l-75 -23
                                        -2635 0 -2635 0 -75 23 c-128 40 -206 88 -300 182 -94 94 -142 172 -182 300
                                        l-23 75 0 1585 0 1585 23 75 c40 127 88 206 182 301 97 98 197 155 333 189
                                        132 33 150 55 157 195 l5 100 345 0 345 0 5 -91 c6 -100 20 -132 73 -164 31
                                        -19 54 -20 557 -20 503 0 526 1 557 20 45 27 56 48 133 246 38 97 80 195 94
                                        218 48 82 169 180 256 207 14 4 403 7 865 6 l840 -2 54 -29z"></path>
                                        <path d="M3960 5165 c-820 -112 -1456 -752 -1565 -1574 -112 -840 395 -1666
                                        1196 -1946 1190 -416 2429 459 2429 1715 0 753 -470 1434 -1176 1703 -265 102
                                        -603 140 -884 102z m532 -294 c625 -125 1103 -610 1224 -1241 25 -132 25 -408
                                        0 -540 -123 -639 -607 -1123 -1246 -1246 -143 -27 -419 -25 -560 5 -398 84
                                        -718 288 -955 608 -126 172 -228 408 -271 633 -25 132 -25 408 0 540 44 229
                                        146 466 278 642 264 354 641 567 1098 622 78 9 338 -5 432 -23z"></path>
                                        <path d="M880 5023 c-61 -22 -142 -104 -163 -167 -63 -184 72 -376 263 -376
                                        151 0 280 129 280 280 0 75 -27 139 -84 196 -80 80 -189 104 -296 67z"></path>
                                        </g>
                                    </svg>

                            </div>

                            @endif
                            <img src="{{ $channel->image()}}" alt="">
                        </div>
                    </div>

                    <div class="form-group">
                        <h4 class="text-center">
                            {{ $channel->name }}
                        </h4>

                        <p class="text-center">
                            {{ $channel->description }}
                        </p>

                        <div class="text-center">
                        <subscribe-button :channel="{{ $channel }}"  :initial-subscriptions="{{ $channel->subscriptions }}" inline-template>
                                <button class="btn btn-danger" @click="toggleSubscription">
                                    @{{ owner ? '' : subscribed ? 'Unsubscribe' : 'Subscribe' }}
                                    @{{ count }} @{{ owner ? 'Subscribers':''}}
                                </button>
                            </subscribe-button>
                        </div>
                    </div>

                    @if($channel->editable())
                    <input type="file" name="image" id="image" onchange="document.getElementById('update-channel-form').submit()" style="display:none">


                    <div class="form-group">
                        <label for="name" class="form-control-label">
                            Name:
                        </label>

                        <input type="text" name="name" value="{{ $channel->name }}"
                            id="name" class="form-control">
                    </div>

                    <div class="form-group">
                            <label for="desc" class="form-control-label">
                                Description:
                            </label>

                            <textarea type="text" name="description" rows="3" cols="3"
                                id="description" class="form-control">{{ $channel->description }}</textarea>
                        </div>

                        @if($errors->any())
                        <ul class="list-group mb-3">
                            @foreach($errors->all() as $error)
                            <li class="list-group-item text-danger">
                                    {{ $error}}
                                </li>
                            @endforeach
                        </ul>

                        @endif

                        <button class="btn btn-info thejames" type="submit">Update Channel</button>


                    @endif

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
