<style>
    .upcoming-events img {
        width: 100%;
        object-fit: cover;
    }

    .upcoming-events .card {
        border: none;
        border-radius: 0;
    }

    .upcoming-event-date-time {
        text-transform: uppercase;
        font-weight: 900;
        font-size: 0.8rem;
        letter-spacing: 0.25rem;
        color: #2b292a;
        border: 1px solid #2b292a;
    }


    .upcoming-event-link {
        font-weight: 700;
        display: inline-block;
    }

    .news-card {
        background-color: #e9ecef !important;
    }

    .news-card img {
        height: 200px !important;
    }

    .news-card a {
        color: #275D38;

    }

    .news-card a:hover {
        color: #047C3B;
    }




    /* Medium devices (tablets, 768px and up) */
    @media (min-width: 768px) {
        .upcoming-event-date-time {
            font-weight: 900;
            font-size: 0.8rem;
            letter-spacing: 0.125rem;
        }

        .upcoming-event-link {
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.02rem;
        }
    }

    /* Large devices (desktops, 992px and up) */
    @media (min-width: 992px) {
        .upcoming-event-date-time {
            font-weight: 900;
            font-size: 0.8rem;
            letter-spacing: 0.24rem;
        }

        .upcoming-event-link {
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.02rem;
        }
    }

    /* X-Large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {
        .upcoming-event-date-time {
            font-weight: 900;
            font-size: 0.8rem;
            letter-spacing: 0.25rem;
        }

        .upcoming-event-link {
            font-weight: 700;
        }
    }
</style>

@foreach ($news as $item)
<div class="col">
    <div class="card h-100 news-card">
        <div><img alt="" src="{{asset('public/upload/news/' . $item->image) }}" />
        </div>
        <div class="py-3 px-2">
            <div class="mt-0 mb-3 "><span class="upcoming-event-date-time py-1 px-2">{{ date('M d, Y',
                    strtotime($item->date)) }}</span></div>
            <a class="stretched-link upcoming-event-link" href="{{ route('news.details', $item->id) }}">{{ $item->title
                }} </a>
        </div>
    </div>
</div>
@endforeach