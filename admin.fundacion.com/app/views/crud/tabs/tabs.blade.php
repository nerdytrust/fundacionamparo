

<br>
<br>
<br>



<div class="container">
  <div class="scroller scroller-left"><i class="glyphicon glyphicon-chevron-left"></i></div>
  <div class="scroller scroller-right"><i class="glyphicon glyphicon-chevron-right"></i></div>
  <div class="wrapper">
    <ul class="nav nav-tabs list" id="myTab">
      <li class="active"><a href="#home">Home</a></li>
      <li><a href="#profile">Profile</a></li>
      <li><a href="#messages">Messages</a></li>
      <li><a href="#settings">Settings</a></li>
      <li><a href="#">Tab4</a></li>
      <li><a href="#">Tab5</a></li>
      <li><a href="#">Tab6</a></li>
      <li><a href="#">Tab7</a></li>
      <li><a href="#">Tab8</a></li>
      <li><a href="#">Tab9</a></li>
      <li><a href="#">Tab10</a></li>
      <li><a href="#">Tab11</a></li>
    <li><a href="#">Tab12</a></li>
      <li><a href="#">Tab13</a></li>
      <li><a href="#">Tab14</a></li>
    <li><a href="#">Tab15</a></li>
      <li><a href="#">Tab16</a></li>
      <li><a href="#">Tab17</a></li>
  </ul>



  </div>


</div>







<div role="tabpanel">

  <!-- Nav tabs -->
  
  <ul class="nav nav-tabs" role="tablist">
  	<?php $index = 0 ?>
    @foreach ($tabs as $table => $name)
      
  		<li role="presentation" class="@if($index == 0) active @endif"><a data-toggle="tabajax" href="{{ $model }}/{{ $key_value }}/tab/{{ $table }}"  rel="tooltip" data-target="#{{$table}}">{{$name}}</a></li>
      <?php $index++ ?>
    @endforeach

  </ul>

  <!-- Tab panes -->

  <div class="tab-content">
    <?php $index = 0 ?>
  	@foreach ($tabs as $table => $name)
    	<div role="tabpanel" class="tab-pane @if($index == 0) active @endif" id="{{$table}}">
     
        
        
      </div>
    <?php $index++ ?>
	 @endforeach

  </div>

</div>
