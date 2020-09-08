@if(session('success'))
    <div class="alert alert-success" style="background: #00b894; margin-top: 13px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">
            <i class="fas fa-times"></i>
        </a>
        <span class="text-light"><strong>{{ session('success') }}</strong></span>
    </div>
@endif
