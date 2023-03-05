
    @csrf
    <div>
        <label for="title">Заголовок</label>
        <p><textarea id="title" name="title" rows="2" cols="50">{{ $news->title ?? '' }}</textarea></p>
    </div>
    <div>
        <label for="preview">Анонс новости</label>
        <p><textarea id="preview" name="preview" rows="10" cols="50">{{ $news->preview ?? '' }}</textarea></p>
    </div>
    <div>
        <label for="text">Текст новости</label>
        <p><textarea id="text" name="text" rows="20" cols="50">{{ $news->text ?? '' }}</textarea></p>
    </div>
    <div>
        <input type="file" accept="image/jpeg,image/gif" name="image">
    </div>

