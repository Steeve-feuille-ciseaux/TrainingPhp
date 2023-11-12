<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="container mt-3">
  <h2>modèle Template</h2>
  <br>
  <!-- Nav pills -->
  <ul class="nav nav-pills" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="pill" href="#menu1">Template Liste</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#menu2">Template Detail</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#menu3">Template Detail Réseaux Sociaux</a>
    </li>
  </ul>

  <div class="tab-content">
    <div id="menu1" class="container tab-pane active"><br>
      <div class="row">
          <div class="col-md-4 mb-3">
            <div class="card text-center">
              <div class="card-header">
                <h5 class="card-title">Titre</h5>
              </div>
              <div class="card-body">
                <span>Créneau du : </span>
                <br>
                <span>Crée le : </span>
                <p class="card-text"></p>
                <br>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Open modal
                </button>
                <!-- The Modal -->
                <div class="modal" id="myModal">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Modal Heading</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            Modal body..
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>

                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="col-md-4 mb-3">
            <div class="card text-center">
              <div class="card-header">
                <h5 class="card-title">Titre</h5>
              </div>
              <div class="card-body">
                <span>Créneau du : </span>
                <br>
                <span>Crée le : </span>
                <p class="card-text"></p>
                <br>
                <a href="{{ nl_liste.html}}" class="btn btn-primary">Voir plus</a>
              </div>
            </div>
          </div>
          <br>
          <div class="col-md-4 mb-3">
            <div class="card text-center">
              <div class="card-header">
                <h5 class="card-title">Titre</h5>
              </div>
              <div class="card-body">
                <span>Créneau du : </span>
                <br>
                <span>Crée le : </span>
                <p class="card-text"></p>
                <br>
                <a href="{{ nl_liste.html}}" class="btn btn-primary">Voir plus</a>
              </div>
            </div>
          </div>
          <br>
          <div class="col-md-4 mb-3">
            <div class="card text-center">
              <div class="card-header">
                <h5 class="card-title">Titre</h5>
              </div>
              <div class="card-body">
                <span>Créneau du : </span>
                <br>
                <span>Crée le : </span>
                <p class="card-text"></p>
                <br>
                <a href="{{ nl_liste.html}}" class="btn btn-primary">Voir plus</a>
              </div>
            </div>
          </div>
          <br>
      </div>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
      <div class="row">
          <div class="col-md-4 mb-3">
            <div class="card text-center">
              <div class="card-header">
                <h5 class="card-title">Titre</h5>
              </div>
              <div class="card-body">
                <span>Créneau du : </span>
                <br>
                <span>Crée le : </span>
                <p class="card-text"></p>
                <br>
                <a href="{{ nl_liste.html}}" class="btn btn-primary">Voir plus</a>
              </div>
            </div>
          </div>
          <br>
          <div class="col-md-4 mb-3">
            <div class="card text-center">
              <div class="card-header">
                <h5 class="card-title">Titre</h5>
              </div>
              <div class="card-body">
                <span>Créneau du : </span>
                <br>
                <span>Crée le : </span>
                <p class="card-text"></p>
                <br>
                <a href="{{ nl_liste.html}}" class="btn btn-primary">Voir plus</a>
              </div>
            </div>
          </div>
          <br>
      </div>
    </div>
    <div id="menu3" class="container tab-pane fade">
      <div class="row">
          <div class="col-md-4 mb-3">
            <div class="card text-center">
              <div class="card-header">
                <h5 class="card-title">Titre</h5>
              </div>
              <div class="card-body">
                <span>Créneau du : </span>
                <br>
                <span>Crée le : </span>
                <p class="card-text"></p>
                <br>
                <a href="{{ nl_liste.html}}" class="btn btn-primary">Voir plus</a>
              </div>
            </div>
          </div>
          <br>
          <div class="col-md-4 mb-3">
            <div class="card text-center">
              <div class="card-header">
                <h5 class="card-title">Titre</h5>
              </div>
              <div class="card-body">
                <span>Créneau du : </span>
                <br>
                <span>Crée le : </span>
                <p class="card-text"></p>
                <br>
                <a href="{{ nl_liste.html}}" class="btn btn-primary">Voir plus</a>
              </div>
            </div>
          </div>
          <br>
          <div class="col-md-4 mb-3">
            <div class="card text-center">
              <div class="card-header">
                <h5 class="card-title">Titre</h5>
              </div>
              <div class="card-body">
                <span>Créneau du : </span>
                <br>
                <span>Crée le : </span>
                <p class="card-text"></p>
                <br>
                <a href="{{ nl_liste.html}}" class="btn btn-primary">Voir plus</a>
              </div>
            </div>
          </div>
          <br>
          <div class="col-md-4 mb-3">
            <div class="card text-center">
              <div class="card-header">
                <h5 class="card-title">Titre</h5>
              </div>
              <div class="card-body">
                <span>Créneau du : </span>
                <br>
                <span>Crée le : </span>
                <p class="card-text"></p>
                <br>
                <a href="{{ nl_liste.html}}" class="btn btn-primary">Voir plus</a>
              </div>
            </div>
          </div>
          <br>
          <div class="col-md-4 mb-3">
            <div class="card text-center">
              <div class="card-header">
                <h5 class="card-title">Titre</h5>
              </div>
              <div class="card-body">
                <span>Créneau du : </span>
                <br>
                <span>Crée le : </span>
                <p class="card-text"></p>
                <br>
                <a href="{{ nl_liste.html}}" class="btn btn-primary">Voir plus</a>
              </div>
            </div>
          </div>
          <br>
      </div>
    </div>
  </div>
</div>
