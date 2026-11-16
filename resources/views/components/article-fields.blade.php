@props(['categories', 'article' => null])
@php
    $heading = old('heading', $article?->heading);
    $body = old('text', $article?->text);
@endphp

<label for="heading">Заголовок</label>
<input id="heading" name="heading" type="text" value="{{ is_string($heading) ? $heading : '' }}" maxlength="150" required>

<label for="category_id">Категория</label>
<select id="category_id" name="category_id" required>
    <option value="">Выбери категорию</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}" @selected(old('category_id', $article?->category_id) == $category->id)>
            {{ $category->name }}
        </option>
    @endforeach
</select>

<label for="text">Текст статьи</label>
<textarea id="text" name="text" rows="7" maxlength="15000" required>{{ is_string($body) ? $body : '' }}</textarea>
