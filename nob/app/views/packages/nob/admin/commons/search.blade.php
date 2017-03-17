        <form method="GET" action="{{ $route }}" class="navbar-form navbar-right" role="search">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="{{
                    trans("admin::admin.placeholder.search") }}" value="{{
                    Input::get('search') }}" />
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>