  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-info elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
          <img src="{{ asset('logoo.png') }}" alt="MPP" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Mal Pelayanan Publik</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="pb-3 mt-3 mb-3 user-panel d-flex">
              <div class="image">
                  <img src="{{ asset('soul.png') }}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ auth()->user()->name ?? '-' }}</a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="{{ route('dashboard') }}"
                          class="nav-link {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
                          <i class="nav-icon fas fa-home"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('berita.index') }}"
                          class="nav-link {{ Request::segment(1) == 'berita' ? 'active' : '' }}">
                          <i class="nav-icon far fa-newspaper"></i>
                          <p>
                              Berita
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('penyelenggara.index') }}"
                          class="nav-link {{ Request::segment(1) == 'penyelenggara' ? 'active' : '' }}">
                          <i class="nav-icon far fa-building"></i>
                          <p>
                              Penyelenggara
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('aplikasi.index') }}"
                          class="nav-link {{ Request::segment(1) == 'aplikasi' ? 'active' : '' }}">
                          <i class="nav-icon fa fa-solid fa-desktop"></i>
                          <p>
                              List Aplikasi
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('faq.index') }}"
                          class="nav-link {{ Request::segment(1) == 'faq' ? 'active' : '' }}">
                          <i class="nav-icon fa fa-solid fa-list"></i>
                          <p>
                              FAQ
                          </p>
                      </a>
                  </li>
                  <li
                      class="nav-item 
                        {{ Request::segment(1) == 'sosial-media' ? ' menu-open' : '' }}
                        {{ Request::segment(1) == 'kontak' ? ' menu-open' : '' }}
                        {{ Request::segment(1) == 'sampul' ? ' menu-open' : '' }}
                        {{ Request::segment(1) == 'bupati' ? ' menu-open' : '' }}
                        {{ Request::segment(1) == 'visi' ? ' menu-open' : '' }}
                        {{ Request::segment(1) == 'arti' ? ' menu-open' : '' }}
                        {{ Request::segment(1) == 'operasional' ? ' menu-open' : '' }}
                        {{ Request::segment(1) == 'popup' ? ' menu-open' : '' }}
                        ">
                      <a href="#"
                          class="nav-link
                            {{ Request::segment(1) == 'sosial-media' ? ' active' : '' }}
                            {{ Request::segment(1) == 'kontak' ? ' active' : '' }}
                            {{ Request::segment(1) == 'sampul' ? ' active' : '' }}
                            {{ Request::segment(1) == 'bupati' ? ' active' : '' }}
                            {{ Request::segment(1) == 'visi' ? ' active' : '' }}
                            {{ Request::segment(1) == 'arti' ? ' active' : '' }}
                            {{ Request::segment(1) == 'operasional' ? ' active' : '' }}
                            {{ Request::segment(1) == 'popup' ? ' active' : '' }}
                      ">
                          <i class="nav-icon fas fa-info-circle"></i>
                          <p>
                              Informasi Umum
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('popup') }}"
                                  class="nav-link {{ Request::segment(1) == 'popup' ? 'active' : '' }}">
                                  @if (Request::segment(1) == 'popup')
                                      <i class="far fa-dot-circle nav-icon ml-3"></i>
                                  @else
                                      <i class="far fa-circle nav-icon ml-3"></i>
                                  @endif
                                  <p>Pop Up</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('operasional') }}"
                                  class="nav-link {{ Request::segment(1) == 'operasional' ? 'active' : '' }}">
                                  @if (Request::segment(1) == 'operasional')
                                      <i class="far fa-dot-circle nav-icon ml-3"></i>
                                  @else
                                      <i class="far fa-circle nav-icon ml-3"></i>
                                  @endif
                                  <p>Jam Operasional</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('visi') }}"
                                  class="nav-link {{ Request::segment(1) == 'visi' ? 'active' : '' }}">
                                  @if (Request::segment(1) == 'visi')
                                      <i class="far fa-dot-circle nav-icon ml-3"></i>
                                  @else
                                      <i class="far fa-circle nav-icon ml-3"></i>
                                  @endif
                                  <p>Visi | Misi | Motto</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('arti') }}"
                                  class="nav-link {{ Request::segment(1) == 'arti' ? 'active' : '' }}">
                                  @if (Request::segment(1) == 'arti')
                                      <i class="far fa-dot-circle nav-icon ml-3"></i>
                                  @else
                                      <i class="far fa-circle nav-icon ml-3"></i>
                                  @endif
                                  <p>Arti Logo</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('sosmed') }}"
                                  class="nav-link {{ Request::segment(1) == 'sosial-media' ? 'active' : '' }}">
                                  @if (Request::segment(1) == 'sosial-media')
                                      <i class="far fa-dot-circle nav-icon ml-3"></i>
                                  @else
                                      <i class="far fa-circle nav-icon ml-3"></i>
                                  @endif
                                  <p>Sosial Media</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('kontak') }}"
                                  class="nav-link {{ Request::segment(1) == 'kontak' ? 'active' : '' }}">
                                  @if (Request::segment(1) == 'kontak')
                                      <i class="far fa-dot-circle nav-icon ml-3"></i>
                                  @else
                                      <i class="far fa-circle nav-icon ml-3"></i>
                                  @endif
                                  <p>Kontak Kami</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('sampul') }}"
                                  class="nav-link {{ Request::segment(1) == 'sampul' ? 'active' : '' }}">
                                  @if (Request::segment(1) == 'sampul')
                                      <i class="far fa-dot-circle nav-icon ml-3"></i>
                                  @else
                                      <i class="far fa-circle nav-icon ml-3"></i>
                                  @endif
                                  <p>Sampul Gambar</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('bupati') }}"
                                  class="nav-link {{ Request::segment(1) == 'bupati' ? 'active' : '' }}">
                                  @if (Request::segment(1) == 'bupati')
                                      <i class="far fa-dot-circle nav-icon ml-3"></i>
                                  @else
                                      <i class="far fa-circle nav-icon ml-3"></i>
                                  @endif
                                  <p>Bupati & Wakil</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item mt-3">
                      <a href="{{ route('password') }}"
                          class="nav-link {{ Request::segment(1) == 'ganti-password' ? 'active' : '' }}">
                          <i class="nav-icon fas fa-key"></i>
                          <p>
                              Ganti Password
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
