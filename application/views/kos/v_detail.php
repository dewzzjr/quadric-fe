<div class="row">
    <div class="col s12 m6 l5">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="{link_foto}" alt="FindingKost" />
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">
                    LIHAT <b>FASILITAS</b> !
                    <i class="material-icons right">more_vert</i>
                </span>
                <p>{button_daftar}</p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">
                    Fasilitas<i class="material-icons right">close</i>
                </span>
                <p>{fasilitas}</p>
            </div>
        </div>
    </div>
    <div class="col s12 m6 l7">
        <ul class="collection">
            <a href="{link_username}">
            <li class="collection-item avatar">
                <i class="material-icons circle blue">perm_contact_calendar</i>
                <span class="title">Nama Pemilik</span>
                <p>
                    <h4>{nama}</h4>
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
            </li>
            </a>
            <li class="collection-item avatar">
                <i class="material-icons circle red">room</i>
                <span class="title">Alamat</span>
                <p>
                    <strong>{alamat}</strong>
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
            </li>
            <li class="collection-item avatar">
                <i class="material-icons circle green">call</i>
                <span class="title">Telepon</span>
                <p>
                    <em>{telepon}</em>
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
            </li>
            <li class="collection-item avatar">
                <i class="material-icons circle blue">payment</i>
                <span class="title">Harga</span>
                <p>
                    <mark><b>Rp {harga} / bulan-</b></mark>
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
            </li>
        </ul>
    </div>
</div>