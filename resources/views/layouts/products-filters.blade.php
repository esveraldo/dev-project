<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-filter"></i> <strong>Filtros de Busca</strong></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <form action="{{route('products.index')}}" method="get" id="filter">
        <div class="box-body">
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="group">Filtrar por Grupo:</label>
                    <select multiple name="group[]" id="group" class="select2 form-control">
                        @foreach($groups as $key => $group)
                            <option value="{{$key}}" {{isset($whereGroup) ? (in_array($key, $whereGroup) ? 'selected' : '') : ''}}>{{$group->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="brand">Filtrar por Marca:</label>
                    <select multiple name="brand[]" id="brand" class="select2 form-control">
                        @foreach($brands as $key => $brand)
                            <option value="{{$key}}" {{isset($whereBrand) ? (in_array($key, $whereBrand) ? 'selected' : '') : ''}}>{{$brand->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="gender">Filtrar por Status:</label>
                    <select multiple name="status[]" id="status" class="select2 form-control">
                        <option value="1" {{isset($whereStatus) ? (in_array('1', $whereStatus) ? 'selected' : '') : ''}}>Ativado</option>
                        <option value="0" {{isset($whereStatus) ? (in_array('0', $whereStatus) ? 'selected' : '') : ''}}>Desativado</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="price">Filtrar por Preço:</label>
                    <input type="text" value="" class="slider form-control" data-slider-min="1" data-slider-max="1000"
                           data-slider-step="1" data-slider-value="[{{isset($wherePrice) ? $wherePrice : '1,1000'}}]" data-slider-orientation="horizontal"
                           data-slider-selection="before" data-slider-tooltip="show" data-slider-id="green" name="price" id="price">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="productFilter">Busca Rápida</label>
                    <input class="form-control" type="text" id="productFilter" name="userFilter" placeholder="Busca por nome, email ou telefone">
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
                                <td class="col-md-6"><label><input type="checkbox" name="fields[]" value="id" class="minimal field"> Nome</label></td>
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

