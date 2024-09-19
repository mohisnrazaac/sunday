@extends('layouts.admin')
<style>
    .window-wrapper {
        border: 1px solid #30ADD4;
    }
    .window{
        font-family: 'Rajdhani';
    }
    .window .top-sidebar {
    background: #014D75;
    border-bottom: 1px solid #30ADD4;
    border-right: 1px solid #30ADD4;
}
    .window .top-window-header {
    background: #0A2A5B;
    border-bottom: 1px solid #30ADD4;
}
.window h4 {
    color: #58E9FF;
    font-size: 22px;
}
.window .color-code {
    color: #56A190;
    text-align: left;
}
.window p, .window .iconColor {
    color: #4FF6FC;
}

.window .btn-sm {
    border: 1px solid #154279;
}
.window .icon-section {
    background: #063D6C;
    border-right: 1px solid #30ADD4;
    border-bottom: 1px solid #30ADD4;
}
.window .inner-sidebar-section {
    background: #07274F;
    border-right: 1px solid #30ADD4;
    border-bottom: 1px solid #30ADD4;
}
.terminal-background {
    background: radial-gradient(circle, #0F1047, #020310);
    font-family: Consolas, "Courier New", monospace; /* Monospace font for terminal look */
}
.ls-IP {
    letter-spacing: 5px;
}
.bullet {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin-right: 10px;
    }
</style>
@section('content')

<div class="container window-wrapper mt-5">
    <div class="row window text-center">
        <div class="col-3 top-sidebar align-content-center">
            <div class="d-flex justify-content-center">
                <h4 class="pb-0 mb-0">Target Guide</h4>
            </div>
        </div>
        <div class="col-9 top-window-header py-1">
            <div class="d-flex align-items-center">
                <p class="text-uppercase pb-0 mb-0" style="margin-inline-end: auto;">jzx 501 - virtualization</p>
                <p class="text-uppercase pb-0 mb-0 me-4">expires in: 00:00:21:18</p>
                <a href="#" class="btn btn-sm blue-color me-2 text-uppercase px-3">Extend</a>
                <a href="#" class="btn btn-sm grey-color me-2 text-uppercase px-3">end lab</a>
                <div class="text-end">
                    <i class="fa-solid fa-maximize iconColor"></i>
                    <i class="fa-regular fa-circle-question iconColor mx-1"></i>
                    <i class="fa-solid fa-gear iconColor"></i>
                </div>
            </div>
        </div>
        <div class="col-3 px-0">
            <ul>
                <li class="icon-section">
                    <div class="text-center ps-3 py-2 border-top-0">
                        <a href="#" class="iconColor me-2">
                            <i class="fa-solid iconColor fa-share-nodes"></i>
                        </a>
                        <a href="#" class="iconColor mx-2">
                            <i class="fa-solid iconColor fa-download"></i>
                        </a>
                        <a href="#" class="iconColor mx-2">
                            <i class="fa-solid iconColor fa-bars"></i>
                        </a>
                        <a href="#" class="iconColor ms-2">
                            <i class="fa-solid iconColor fa-arrow-up-right-from-square"></i>
                        </a>
                    </div>
                </li>
                <li class="inner-sidebar-section">
                    <div class="text-center ps-3 py-2">
                        <p class="pt-2 fs-5">Identified Targets</p>
                    </div>
                </li>
                @for ($i = 0; $i < 11; $i++)
                    <li class="inner-sidebar-section">
                        <div class="ps-3">
                            <p class="mb-0 ls-IP fs-4 text-left" style="text-align: left;">
                                <span class="bullet" style="background-color: {{ sprintf('#%06X', mt_rand(0, 0xFFFFFF)) }};"></span>
                                192.168.1.{{ $i + 2 }}
                            </p>
                        </div>
                    </li>
                @endfor
            </ul>
        </div>

        <div class="col-9 p-3 terminal-background">
            <code class="color-code">
                <pre class="mb-0" style="white-space: pre-line;">
                    # Update package list and upgrade all packages
                    sudo apt-get update && sudo apt-get upgrade -y
        
                    # Install Git
                    sudo apt-get install git -y
        
                    # Clone a repository
                    git clone https://github.com/example/repo.git
        
                    # Navigate into the project directory
                    cd repo
        
                    # Create a new branch
                    git checkout -b new-feature
        
                    # Add all changes to staging
                    git add .
        
                    # Push changes to the new branch
                    git push origin new-feature
        
                    # Exit the terminal
                    exit
                </pre>
            </code>
        </div>
    </div>
</div>

@endsection