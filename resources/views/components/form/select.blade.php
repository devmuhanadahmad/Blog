
  <div class="form-group " >
    <label for="exampleFormControlSelect1">Select {{$name}}</label>
    <select class="form-control" id="exampleFormControlSelect1" name="{{$name}}" >
      <option disabled>No Parint</option>
      @foreach ($options as $value => $text)
      <option value="{{$value}}" @selected($value == $selected)>{{$text}}</option>
      @endforeach

    </select>
  </div>
