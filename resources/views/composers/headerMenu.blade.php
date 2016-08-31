<div class="menu">
    <ul>
        <li><a href="#">recommend</a>
             <span class="menu-dropdown">
                 <div class="frame crazy sub-menu-list-item" id="basic">
                     <ul>
                         @foreach($menu['recommend'] as $item)

                             <li>
                                 <a class="dropdown-item"
                                    href="{{ asset($item['id']) }}">
                                     <img sizes="213px"
                                          srcset="https://i.ytimg.com/vi/{{ $item['id'] }}/mqdefault.jpg?custom=true&w=196&h=110&stc=true&jpg444=true&jpgq=90&sp=68"
                                          alt="Hoofd">
                                     <div class="title">{{ $item['title'] }}</div>
                                 </a>
                             </li>

                         @endforeach
                     </ul>
                 </div>
            </span>
        </li>
        <li><a href="#">top hit</a>
             <span class="menu-dropdown">
                 <div class="frame crazy sub-menu-list-item" id="basic">
                     <ul>
                         @foreach($menu['hit'] as $item)

                             <li>
                                 <a class="dropdown-item"
                                    href="{{ asset($item['id']) }}">
                                     <img sizes="213px"
                                          srcset="https://i.ytimg.com/vi/{{ $item['id'] }}/mqdefault.jpg?custom=true&w=196&h=110&stc=true&jpg444=true&jpgq=90&sp=68"
                                          alt="Hoofd">
                                     <div class="title">{{ $item['title'] }}</div>
                                 </a>
                             </li>

                         @endforeach
                     </ul>
                 </div>
            </span>
        </li>
        <li><a href="#">movie</a>
            <span class="menu-dropdown">
                 <div class="frame crazy sub-menu-list-item" id="basic">
                     <ul>
                         @foreach($menu['movie'] as $item)

                             <li>
                                 <a class="dropdown-item"
                                    href="{{ asset($item['id']) }}">
                                     <img sizes="213px"
                                          srcset="https://i.ytimg.com/vi/{{ $item['id'] }}/mqdefault.jpg?custom=true&w=196&h=110&stc=true&jpg444=true&jpgq=90&sp=68"
                                          alt="Hoofd">
                                     <div class="title">{{ $item['title'] }}</div>
                                 </a>
                             </li>

                         @endforeach
                     </ul>
                 </div>
            </span>
        </li>
        <li><a href="#">food</a>
             <span class="menu-dropdown">
                 <div class="frame crazy sub-menu-list-item" id="basic">
                     <ul>
                         @foreach($menu['food'] as $item)

                             <li>
                                 <a class="dropdown-item"
                                    href="{{ asset($item['id']) }}">
                                     <img sizes="213px"
                                          srcset="https://i.ytimg.com/vi/{{ $item['id'] }}/mqdefault.jpg?custom=true&w=196&h=110&stc=true&jpg444=true&jpgq=90&sp=68"
                                          alt="Hoofd">
                                     <div class="title">{{ $item['title']  }}</div>
                                 </a>
                             </li>

                         @endforeach
                     </ul>
                 </div>
            </span>
        </li>
    </ul>
</div>