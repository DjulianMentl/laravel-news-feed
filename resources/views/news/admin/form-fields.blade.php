
    @csrf
    <div>
        <label for="title" class="label-news-edit-form">Заголовок</label>
        <p><textarea id="title" name="title" rows="1" cols="100">{{ $news->title ?? '' }}</textarea></p>
    </div>
    <div>
        <label for="preview" class="label-news-edit-form">Анонс новости</label>
        <p><textarea id="preview" name="preview" rows="4" cols="100">{{ $news->preview ?? '' }}</textarea></p>
    </div>
    <div>
        <label for="text" class="label-news-edit-form">Текст новости</label>
        <p><textarea id="text" name="text" rows="8" cols="100">{{ $news->text ?? '' }}</textarea></p>
    </div>

    @if(!empty($news->image))
        <div>
            <img src="{{ $news->image }}" alt="Картинка новости">
            <input type="hidden" name="oldImage" value="{{ $news->image }}">

            <label class="checkbox">
                <input name="del-img" type="checkbox" value="{{ $news->image }}"> Удалить изображение
            </label>
        </div>
    @else
        <div class="add-img">
            <label for="add-img" class="label-news-edit-form">Изображение</label>
            <div class="btn-add-img"><input type="file" id="add-img" accept="image/jpeg,image/gif" name="image"></div>
        </div>
    @endif

