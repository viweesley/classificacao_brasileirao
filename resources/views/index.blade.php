<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <script src="{{asset('js/app.js')}}" ></script>
    <title></title>
</head>
<body>
    <main id="app" class="app">
        <div class="container">
            <div class="row justify-content-center pt-4 pb-4">
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-sm-12 pb-3 d-flex align-items-center justify-content-between">
                                <h2>Tabela</h2>
                                <button class="btn btn-success adicionar-confronto" id="adicionar-confronto"> Inserir Confronto </button>
                            </div>
                            <div class="col-sm-12">
                                <table class="table table-classificacao">
                                    <thead>
                                        <tr>
                                            <td style="width: 60%"> Posição</td>
                                            <td>PTS</td>
                                            <td>J</td>
                                            <td>E</td>
                                            <td>D</td>
                                            <td>GP</td>
                                            <td>GC</td>
                                            <td>SG</td>
                                        </tr>
                                    </thead>
            
                                    <tbody>
                                        <tr class="down libertadores">
                                           <td class="clube">
                                                <div class="icon-classificacao pr-3 d-flex">
                                                    <i class="fas fa-chevron-down"></i>
                                                </div>
                                                <img src="https://ssl.gstatic.com/onebox/media/sports/logos/gb8bo2x00XsbvsVp9nGniA_48x48.png" style="width:22px;height:22px" >
                                                <span class="pl-1">Goias </span>
                                           </td>
                                           <td> <strong> 0 </strong> </td>
                                           <td>0</td>
                                           <td>0</td>
                                           <td>0</td>
                                           <td>0</td>
                                           <td>0</td>
                                           <td>0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade modal-adicionar-confronto" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confronto</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" class="form" method="post">
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="form-group col-sm-5 p-0">
                                <label class="" for="">Time da casa</label>
                                <div class="d-flex">
                                    <select class="form-control col-9" name="clube_casa">
                                    </select>
                                    <input type="text" class="form-control col-3 ml-2" name="gols_casa" maxlength="3">
                                </div>
                            </div>
                            <div class="col-sm-1 mt-3 d-flex align-items-center justify-content-center">x</div>
                            <div class="form-group col-sm-5 p-0">
                                <label class="" for="">Visitante</label>
                                <div class="d-flex">
                                    <input type="text" class="form-control col-3 mr-2" name="gols_visitante" maxlength="3">
                                    <select class="form-control col-9" name="clube_visitante" >
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary" data-dismiss="modal">Salvar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
