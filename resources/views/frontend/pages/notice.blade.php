 <div class="site-section">
     <div class="container">
         <div class="row mb-2">
             <table class="table">
                 <thead class="thead-dark">
                     <tr>
                         <th scope="col">SL</th>
                         <th scope="col">Title</th>
                         <th scope="col">Date</th>
                         <th scope="col">Image</th>
                         <th scope="col">Download</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($newses as $news)
                         <tr>
                             <th scope="row">{{ $news->id }}</th>
                             <td>
                                 <div>
                                     <small>{{ $news->notice_title }}</small>
                                     <h6>{{ $news->title }}</h6>
                                 </div>
                             </td>
                             <td>{{ $news->date }}</td>
                             <td>

                                 @if ($news->image)
                                     <img width="100px" height="60px" src="{{ $news->image }}" alt="">
                                 @else
                                     <p class="text-secondary text-center my-auto"> No Image </p>
                                 @endif

                             </td>
                             <td class="p-0 " height="85px" style="display:flex;justify-content: center; align-items: center;">
                                 @if ($news->attach_document)
                                     <a target="_blank" class="" href="{{ asset($news->attach_document) }}">
                                         <img style="height: 30px;width: 30px ;" class=""
                                             src="{{ asset('images/icons/download_icon.svg') }}" alt="pdf"></a>
                                 @else
                                     <p class="text-secondary text-center my-auto"> No document </p>
                                 @endif

                                 </iframe>
                             </td>

                         </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>
     </div>
 </div>
