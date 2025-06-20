@if (Auth::user()->is_favoriteing($micropost->id))
    {{-- お気に入り解除ボタンのフォーム --}}
    <form method="POST" action="{{ route('favorites.unfavorite', $micropost->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-warning btn-block normal-case"
            onclick="return confirm('id = {{ $micropost->id }} のお気に入りを解除します')">Unfavorite</button>
    </form>
@else
    {{-- お気に入りボタンのフォーム --}}
    <form method="POST" action="{{ route('favorites.favorite', $micropost->id) }}">
        @csrf
        <button type="submit" class="btn btn-secondary btn-block normal-case"
        onclick="return confirm('id = {{ $micropost->id }} のお気に入り')">Favorite</button>
    </form>
@endif