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
        <li class="active">
            <a href=" {{ URL::route('accounts.index') }} ">
                <span class="glyphicon glyphicon-user"></span> Gebruikers
            </a>
            <ul>
                <li>
                    <a href=" {{ URL::route('accounts.create') }} ">
                        <span class="glyphicon glyphicon-plus"></span> Gebruiker toevoegen
                    </a>
                </li>
                <li>
                    <a href=" {{ URL::route('user.edit') }} ">
                        <span class="glyphicon glyphicon-pencil"></span> Gegevens wijzigen
                    </a>
                </li>
                <li>
                    <a href=" {{ URL::route('user.update.password') }} ">
                        <span class="glyphicon glyphicon-random"></span> Wachtwoord wijzigen
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href=" {{ URL::route('contacts.index') }} ">
                <span class="glyphicon glyphicon-envelope"></span> Berichten
            </a>
        </li>
        <li>
            <a href=" {{ URL::route('horses.admin.index') }} ">
                <span class="glyphicon glyphicon-shopping-cart"></span> Paarden
            </a>
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
    </ul>
</div> <!-- End col-md-2 quicknav -->