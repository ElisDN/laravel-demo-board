<div class="search-bar pt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <form action="{{ $route }}" method="GET">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="form-group">
                                <input type="text" class="form-control" name="text" value="{{ request('text') }}" placeholder="Search for...">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <button class="btn btn-light border" type="submit"><span class="fa fa-search"></span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3" style="text-align: right">
                <p><a href="{{ route('cabinet.adverts.create') }}" class="btn btn-success"><span class="fa fa-plus"></span> Add New Advertisement</a></p>
            </div>
        </div>
    </div>
</div>