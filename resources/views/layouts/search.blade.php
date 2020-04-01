<div class="card">
  <div class="card-body">
      <form action="{{$url}}" method="GET" class="search-form">
          <div class="input-group">
          <input type="text" class="form-control no-border-radius-right" placeholder="{{$placeholder}}" name="search" aria-label="search" aria-describedby="basic-addon1" value="{{$search}}" required autocomplete="off">
              <div class="input-group-append">
                  @if(isset($search))
              <button class="btn btn-success" type="button" id="button-addon2" onclick="window.location.href = '{{$url}}'"><i class="fa fa-refresh"></i></button>
                  @else
                      <button class="btn btn-secondary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                  @endif
              </div>
          </div>
      </form>
  </div>
</div>