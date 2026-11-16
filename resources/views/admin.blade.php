<x-page title="Админ">
    <x-header />

    <main class="wrap">
        <h1>Админ</h1>
        <x-messages />

        <section class="box">
            <h2>Статьи</h2>
            @forelse ($news as $article)
                <div class="row">
                    <p><strong>{{ $article->heading }}</strong></p>
                    <p class="details">
                        {{ $article->category->name }} · {{ $article->author->login }}
                        · {{ $article->blocked ? 'Заблокирована' : 'Опубликована' }}
                    </p>
                    <div class="actions">
                        <a href="{{ route('admin.edit', $article) }}">Редактировать</a>

                        <form action="{{ route('admin.block', $article) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="blocked" value="{{ $article->blocked ? 0 : 1 }}">
                            <button type="submit" class="secondary">{{ $article->blocked ? 'Разблокировать' : 'Заблокировать' }}</button>
                        </form>

                        <form action="{{ route('admin.destroy', $article) }}" method="post" onsubmit="return confirm('Удалить статью?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="secondary delete">Удалить</button>
                        </form>
                    </div>
                </div>
            @empty
                <p>Статей пока нет.</p>
            @endforelse
        </section>

        <section class="box">
            <h2>Роли пользователей</h2>

            @foreach ($users as $user)
                <div class="row">
                    @if ($user->id === auth()->id())
                        <p><strong>{{ $user->login }}</strong> · {{ $user->role->label() }} (твой аккаунт)</p>
                    @else
                        <form class="role-form" action="{{ route('admin.role', $user) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <label for="role-{{ $user->id }}">{{ $user->login }}</label>
                            <select id="role-{{ $user->id }}" name="role_id" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" @selected($user->role_id === $role->id)>{{ $role->label() }}</option>
                                @endforeach
                            </select>
                            <button type="submit">Сохранить роль</button>
                        </form>
                    @endif
                </div>
            @endforeach
        </section>
    </main>

    <x-footer />
</x-page>
