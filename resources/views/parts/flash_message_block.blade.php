<div class="session_flash">
    <div class="container-wide">
        <div class="row">
            <div class="col-xs-12">
                @if (session('success'))
                    <div class="alert alert-info" role="alert">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                @endif
            </div>
        </div>
    </div>
</div>

