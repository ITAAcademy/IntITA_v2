<div class="steps pt-5 pb-5">
    <div class="container">
        <div class="step-header">
            <h1>{{ t::value('mainpage', '0003') }}</h1>
            <h3>{{ t::value('mainpage', '0007') }}</h3>
        </div>
        @foreach($steps as $step)
            <div class="step mt-5 mb-5">
                <div class="step-image position-relative">
                    <img class="grid" src="{{ asset('images/steps/grid.png')}}">
                    <img class="stepImg" src="{{ asset('images/steps/'.$step->stepImage)}}">
                    <img class="hexagon d-none d-lg-block" src="{{ asset('images/steps/hexagon.png')}}">
                    <img class="hexagon_small d-lg-none" src="{{ asset('images/steps/hexagon_small.png')}}">
                    <div class="step-article">
                        <p class="step-number">{{$step->stepNumber}}</p>
                        <p class="step-name">{{ t::value('step','0043') }}</p>
                    </div>
                </div>
                <div class="step-info pt-md-0 pt-lg-4 pr-3 pl-3">
                    <h2>{{ t::value('step', $step->stepTitle) }}</h2>
                    <p>{{ t::value('step',  $step->stepText) }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>