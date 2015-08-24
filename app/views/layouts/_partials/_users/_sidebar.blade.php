<div class="col-md-2 quicknav">
    <h3>Snelmenu</h3>
    <ul>
        <li>
            <a href=" {{ URL::route('dashboard.index') }} ">
                <span class="glyphicon glyphicon-th-large"></span> Dashboard
            </a>
        </li>
        <li>
            <a href=" {{ URL::route('home') }} ">
                <span class="glyphicon glyphicon-home"></span> Home
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