<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-filter"></i> <strong>Filtros de Busca</strong></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <form action="{{route('users.index')}}" method="get" id="filter">
        <div class="box-body">
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="state">Filtrar por Estado:</label>
                    <select multiple name="state[]" id="state" class="select2 form-control">
                        @foreach($states as $key => $state)
                            <option value="{{$key}}" {{isset($whereState) ? (in_array($key, $whereState) ? 'selected' : '') : ''}}>{{$key}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="city">Filtrar por Cidade:</label>
                    <select multiple name="city[]" id="city" class="select2 form-control">
                        @foreach($cities as $key => $city)
                            <option value="{{$key}}" {{isset($whereCity) ? (in_array($key, $whereCity) ? 'selected' : '') : ''}}>{{$key}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="neighborhood">Filtrar por Bairro:</label>
                    <select multiple name="neighborhood[]" id="neighborhood" class="select2 form-control">
                        @foreach($neighborhoods as $key => $neighborhood)
                            <option value="{{$key}}" {{isset($whereNeighborhood) ? (in_array($key, $whereNeighborhood) ? 'selected' : '') : ''}}>{{$key}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="store">Filtrar por Rifas:</label>
                    <select multiple name="store[]" id="store" class="select2 form-control">
                        @foreach($stores as $key => $store)
                            <option value="{{$store->id}}" {{isset($whereStore) ? (in_array($store->id, $whereStore) ? 'selected' : '') : ''}}>{{$store->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="platform">Filtrar por Plataforma:</label>
                    <select multiple name="platform[]" id="platform" class="select2 form-control">
                        <option value="android" {{isset($wherePlatform) ? (in_array('android', $wherePlatform) ? 'selected' : '') : ''}}>Android</option>
                        <option value="ios" {{isset($wherePlatform) ? (in_array('ios', $wherePlatform) ? 'selected' : '') : ''}}>IOS</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="gender">Filtrar por Gênero:</label>
                    <select multiple name="gender[]" id="gender" class="select2 form-control">
                        <option value="F" {{isset($whereGender) ? (in_array('F', $whereGender) ? 'selected' : '') : ''}}>Feminino</option>
                        <option value="M" {{isset($whereGender) ? (in_array('M', $whereGender) ? 'selected' : '') : ''}}>Masculino</option>
                        <option value="U" {{isset($whereGender) ? (in_array('U', $whereGender) ? 'selected' : '') : ''}}>Não informado</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Filtrar Usuários que:</label><br/>
                    <label style="margin-top: 4px;">
                        <input type="checkbox" name="list[]" value="Y" class="minimal" {{isset($whereList) ? (in_array('Y', $whereList) ? 'checked' : '') : ''}}>
                        Possuem Rifas
                    </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label style="margin-top: 4px;">
                        <input type="checkbox" name="list[]" value="N" class="minimal" {{isset($whereList) ? (in_array('N', $whereList) ? 'checked' : '') : ''}}>
                        Não Possuem Rifas
                    </label>
                    {{--<select multiple name="list[]" id="list" class="select2 form-control">
                        <option value="Y" {{isset($whereList) ? (in_array('Y', $whereList) ? 'selected' : '') : ''}}>Usuários com Rifas Criadas</option>
                        <option value="N" {{isset($whereList) ? (in_array('N', $whereList) ? 'selected' : '') : ''}}>Usuários sem Rifas Criadas</option>
                    </select>--}}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="age">Filtrar por Idade:</label>
                    <input type="text" value="" class="slider form-control" data-slider-min="10" data-slider-max="100"
                           data-slider-step="1" data-slider-value="[{{isset($whereAge) ? $whereAge : '10,100'}}]" data-slider-orientation="horizontal"
                           data-slider-selection="before" data-slider-tooltip="show" data-slider-id="green" name="age" id="age">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="userFilter">Busca Rápida</label>
                    <input class="form-control" type="text" id="userFilter" name="userFilter" placeholder="Busca por nome, email ou telefone">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>&nbsp;</label>
                    <button class="btn btn-block btn-primary" type="submit">
                        <i class="fa fa-filter"></i>
                        Aplicar Filtrar
                    </button>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>&nbsp;</label>
                    <a href="{{route('users.index')}}" class="btn btn-block btn-default" type="button">
                        <i class="fa fa-times"></i>
                        Limpar Filtros
                    </a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>&nbsp;</label>
                    <button class="btn btn-block btn-success" type="button" data-toggle="modal" data-target=".modal">
                        <i class="fa fa-file-excel-o"></i>
                        Exportar para Excel
                    </button>
                </div>
            </div>
        </div>
        <input type="hidden" name="excel" id="excel">

        <div class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><strong>Selecione os Dados que Deseja Exportar</strong></h4>
                    </div>
                    <div class="modal-body">
                        <table style="width: 100%">
                            <tr>
                                <td class="col-md-6"><label><input type="checkbox" name="fields[]" value="name" class="minimal field"> Nome</label></td>
                                <td class="col-md-6"><label><input type="checkbox" name="fields[]" value="email" class="minimal field"> E-mail</label></td>
                            </tr>
                            <tr>
                                <td class="col-md-6"><label><input type="checkbox" name="fields[]" value="phone" class="minimal field"> Telefone</label></td>
                                <td class="col-md-6"><label><input type="checkbox" name="fields[]" value="platform" class="minimal field"> Plataforma</label></td>
                            </tr>
                            <tr>
                                <td class="col-md-6"><label><input type="checkbox" name="fields[]" value="gender" class="minimal field"> Gênero</label></td>
                                <td class="col-md-6"><label><input type="checkbox" name="fields[]" value="birth" class="minimal field"> Data de Nascimento</label></td>
                            </tr>
                            <tr>
                                <td class="col-md-6"><label><input type="checkbox" name="fields[]" value="address" class="minimal field"> Endereço</label></td>
                                <td class="col-md-6"><label><input type="checkbox" name="fields[]" value="complement" class="minimal field"> Complemento</label></td>
                            </tr>
                            <tr>
                                <td class="col-md-6"><label><input type="checkbox" name="fields[]" value="city" class="minimal field"> Cidade</label></td>
                                <td class="col-md-6"><label><input type="checkbox" name="fields[]" value="state" class="minimal field"> Estado</label></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button class="btn btn-success" type="button" onclick="exportar();">
                            <i class="fa fa-file-excel-o"></i>
                            Exportar Dados
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </form>
</div>

