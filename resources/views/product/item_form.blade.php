<div class="row justify-content-center">

    <div>
       <label for="article">Артикул</label>
       <input name="article" value="{{old('article', $item->article)}}"
          id="article" type="text"  required>
    </div>
    <div>
       <label for="name">Название</label>
       <input name="name" value="{{old('name',$item->name)}}"
          id="name" type="text" minlength="10" required>
    </div>
    <div>
       <label for="status">Статус</label>

       <select name="status" id="status" placeholder="Статус" required>
           @php if(empty($item->attributes))
                $status='Доступен';
                else $status=$item->status
           @endphp
           <option  @if($status == 'Доступен') selected="selected" @endif> Доступен</option>
           <option @if($status == 'Недоступен') selected="selected" @endif>  Недоступен </option>
       </select>
    </div>

</div>


