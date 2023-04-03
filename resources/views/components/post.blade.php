@props(['post' => $post])
<tr class="inner-box">
    <th scope="row">
        <div class="event-date">
            <p>{{ $post->created_at->diffForHumans() }}</p>
        </div>
    </th>
    <td>
        <div class="event-img">
            <img src="https://bootdey.com/img/Content/avatar/avatar{{ $post->user->id }}.png" class="rounded-circle"
                alt="" />
        </div>
    </td>
    <td>
        <div class="event-wrap">
            <h3 class="text-start"><a href="{{ route('user.posts', $post->user) }}">{{ $post->user->username }}</a>
            </h3>
            <div class="meta">
                <p class="text-start mb-0" href="#">
                    {{ $post->status }}</p>
                <div class="d-flex justify-content-left">
                    @auth
                        @if (!$post->likedBy(auth()->user()))
                            <form action="{{ route('like.post', $post) }}" method="POST">
                                @csrf
                                <button class="btn btn-link ps-0" type="submit" style="text-decoration: none">Like</button>
                            </form>
                        @else
                            <form action="{{ route('like.post', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-link" type="submit" style="text-decoration: none">Unlike</button>
                            </form>
                        @endif
                    @endauth
                    @if ($post->likes->count())
                        <span
                            class="pt-2">{{ $post->likes->count() . ' ' . Str::plural('like', $post->likes->count()) }}</span>
                    @endif
                </div>
            </div>
        </div>
    </td>
    <td class="d-flex border-bottom-0 my-3">
        <a class="btn btn-primary me-2" href="#">Read More</a>
        @can('delete', $post)
            <form action="{{ route('post.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        @endcan
    </td>
</tr>
