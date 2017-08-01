<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane fade in active" id="home">
      <section class="container">
          @foreach($ctrl->tabMenu as $box)
              <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="thumbnail">
                      <div class="caption">
                          {!!$box['icon']!!}
                          <h4>{{$box['title']}}</h4>
                          <p>{{$box['description'] or '&nbsp;'}}</p>
                          <p><a href="#{{$box['id']}}" class="btn btn-primary" data-toggle="tab">Open</a></p>
                      </div>
                  </div>
              </div>
          @endforeach
      </section>
  </div>

  <!-- Tab Pane -->
  @foreach($ctrl->tabMenu as $pane)
    <div role="tabpanel" class="tab-pane fade" id="{{$pane['id']}}">
      <div class="col-md-12">
          <a href="#home" class="btn btn-primary pull-right" data-toggle="tab">Back</a>
          <h3>{{$pane['title']}}</h3>
      </div>
      <div class="col-md-12">
          {!!$ctrl->content($pane['id'])!!}
      </div>
    </div>
  @endforeach

</div>
