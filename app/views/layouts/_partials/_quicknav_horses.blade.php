<div class="col-md-2 quicknav">
    <h3>Snelmenu</h3>
    <ul>
        <li>
            <a href=" {{ URL::route('admin.index') }} ">
                <span class="glyphicon glyphicon-th-large"></span> Admin panel
            </a>
        </li>
        <li>
            <a href=" {{ URL::route('home') }} ">
                <span class="glyphicon glyphicon-home"></span> Home
            </a>
        </li>
        <li >
            <a href=" {{ URL::route('accounts.index') }} ">
                <span class="glyphicon glyphicon-user"></span> Gebruikers
            </a>
        </li>
        <li >
            <a href=" {{ URL::route('contacts.index') }} ">
                <span class="glyphicon glyphicon-envelope"></span> Berichten
            </a>
        </li>
        <li class="active">
            <a href=" {{ URL::route('horses.admin.index') }} ">
                <span class="glyphicon glyphicon-shopping-cart"></span> Paarden
            </a>
            <ul>
                <li>
                    <a href=" {{ URL::route('horses.create') }} ">
                        <span class="glyphicon glyphicon-plus"></span> Paard toevoegen
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href=" {{ URL::route('items.admin.index') }} ">
                <span class="glyphicon glyphicon-pencil"></span> Nieuws
            </a>
        </li>
        <li>
            <a href="{{ route('ponys.index') }}">
                <span class="glyphicon glyphicon-font"></span> Lespony's
            </a>
        </li>
        <li>
            <a href="{{ route('rosters.index') }}">
                <span class="glyphicon glyphicon-list"></span> Lessen
            </a>
        </li>
        <li>
            <a href="{{ route('riders.index') }}">
                <span class="glyphicon glyphicon-font"></span> Ruiters
            </a>
        </li>
    </ul>
</div> <!-- End col-md-2 quicknav -->