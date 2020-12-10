<div class="sidebar" data-color="blue">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
  <div class="logo">
    <a href="{{ route('home') }}" class="simple-text text-center logo-normal">
      {{ __('Sistema Orçamentário') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      {{-- start orcamentos --}}
      <li class="">
        <a data-toggle="collapse" href="#orcamentos">
          <i class="now-ui-icons ion-ios-bookmarks-outline"></i>
          <p >
            {{ __("Orçamentos") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse @if ($activePage == 'editarorcamento' || $activePage == 'detalheorcamento' || $activePage == 'novoorcamento' || $activePage == 'listagemPedidos') show @endif" id="orcamentos">
          <ul class="nav">
            <li class="@if ($activePage == 'novoorcamento') active @endif">
              <a href="{{ route('orcamento.create') }}">
                <i class="now-ui-icons ion-clipboard"></i>
                <p> {{ __("Novo Orçamento") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'listagemPedidos') active @endif">
              <a href="{{ route('orcamento.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Listagem") }} </p>
              </a>
            </li>
            @if ($activePage == 'detalheorcamento')
            <li class="@if ($activePage == 'detalheorcamento') active @endif">
              <a href="{{ route('orcamento.detalhe', $item->id) }}">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Detalhe do Orçamento") }} </p>
              </a>
            </li>
            @endif
            @if ($activePage == 'editarorcamento')
            <li class="@if ($activePage == 'editarorcamento') active @endif">
              <a href="#">
                <i class="ionicons ion-ios-compose-outline"></i>
                <p> {{ __("Editar Orçamento") }} </p>
              </a>
            </li>
            @endif
          </ul>
        </div>
      </li>
      {{-- end orcamentos --}}

      {{-- start contatos --}}
      <li>
        <a data-toggle="collapse" href="#contatos">
          <i class="fa fa-user-friends"></i>
          <p>
            {{ __("Contatos") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse @if ($activePage == 'listagemfinanceirocontato' || $activePage == 'editarcontato' || $activePage == 'novocontato' || $activePage == 'listagemContato') show @endif" id="contatos">
          <ul class="nav">
            <li class="@if ($activePage == 'novocontato') active @endif">
              <a href="{{ route('contato.create') }}">
                <i class="now-ui-icons ui-1_simple-add"></i>
                <p> {{ __("Novo") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'listagemContato') active @endif">
              <a href="{{ route('contato.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Listagem") }} </p>
              </a>
            </li>
            @if ($activePage == 'editarcontato')
            <li class="@if ($activePage == 'editarcontato') active @endif">
              <a href="{{ route('contato.index') }}">
                <i class="ionicons ion-ios-compose-outline"></i>
                <p> {{ __("Editar Contato") }} </p>
              </a>
            </li>
            @endif
            @if ($activePage == 'listagemfinanceirocontato')
            <li class="@if ($activePage == 'listagemfinanceirocontato') active @endif">
              <a href="#">
                <i class="ionicons ion-social-usd-outline"></i>
                <p> {{ __("Financeiro Contato") }} </p>
              </a>
            </li>
            @endif
          </ul>
        </div>
      </li>
      {{-- end contatos --}}

      {{-- Materiais --}}
      <li>
        <a data-toggle="collapse" href="#produtos">
          <i class="fa fa-box-open"></i>
          <p>
            {{ __("Materiais") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse @if ($activePage == 'novomaterial' || $activePage == 'listagemMateriais' || $activePage == 'editarmaterial') show @endif" id="produtos">
          <ul class="nav">
            <li class="@if ($activePage == 'novomaterial') active @endif">
              <a href="{{ route('material.create') }}">
                <i class="now-ui-icons ui-1_simple-add"></i>
                <p> {{ __("Novo") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'listagemMateriais') active @endif">
              <a href="{{ route('material.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Listagem") }} </p>
              </a>
            </li>
            @if ($activePage == 'editarproduto')
            <li class="@if ($activePage == 'editarmaterial') active @endif">
              <a href="{{ route('material.index') }}">
                <i class="ionicons ion-ios-compose-outline"></i>
                <p> {{ __("Editar Material") }} </p>
              </a>
            </li>
            @endif
          </ul>
        </div>
      </li>
      {{-- end produtos --}}

      {{-- usuários --}}
      <li>
        <a data-toggle="collapse" href="#usuarios">
          <i class="now-ui-icons users_single-02"></i>
          <p>
            {{ __("Usuários") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse @if ($activePage == 'editarusuario' || $activePage == 'listagemusuario' || $activePage == 'novousuario') show @endif" id="usuarios">
          <ul class="nav">
            <li class="@if ($activePage == 'novousuario') active @endif">
              <a href="{{ route('register') }}">
                <i class="now-ui-icons ui-1_simple-add"></i>
                <p> {{ __("Novo") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'listagemusuario') active @endif">
              <a href="{{ route('user.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Listagem") }} </p>
              </a>
            </li>
            @if ($activePage == 'editarusuario')
            <li class="@if ($activePage == 'editarusuario') active @endif">
              <a href="#">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Editar Usuário") }} </p>
              </a>
            </li>
            @endif
          </ul>
        </div>
      </li>
      {{-- end usuários --}}
    </ul>
  </div>
</div>
