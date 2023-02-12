<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo')->nullable();
            $table->string('descricao')->nullable();
            $table->string('tipo')->nullable();
            $table->string('situacao')->nullable();
            $table->string('unidade')->nullable();
            $table->string('slug')->nullable();
            $table->string('preco')->nullable();
            $table->float('precoCusto',10)->default(0)->nullable();
            $table->string('descricaoCurta')->nullable();
            $table->string('descricaoComplementar')->nullable();
            $table->date('dataInclusao')->nullable();
            $table->date('dataAlteracao')->nullable();
            $table->string('imageThumbnail')->nullable();
            $table->string('urlVideo')->nullable();
            $table->string('nomeFornecedorc')->nullable();
            $table->string('codigoFabricante')->nullable();
            $table->string('marca')->nullable();
            $table->string('class_fiscal')->nullable();
            $table->float('cest',10)->default(0)->nullable();
            $table->string('origem')->nullable();
            $table->string('idGrupoProduto')->nullable();
            $table->string('linkExterno')->nullable();
            $table->string('observacoes')->nullable();
            $table->string('grupoProduto')->nullable();
            $table->string('garantia')->nullable();
            $table->string('descricaoFornecedor')->nullable();
            $table->integer('idFabricante')->nullable();
            $table->float('pesoLiq',10)->default(0)->nullable();
            $table->float('pesoBruto',10)->default(0)->nullable();  
            $table->float('estoqueMinimo',10)->default(0)->nullable();
            $table->float('estoqueMaximo',10)->default(0)->nullable();  
            $table->string('gtin')->nullable();
            $table->string('gtinEmbalagem')->nullable();
            $table->string('larguraProduto')->nullable();
            $table->string('alturaProduto')->nullable();
            $table->string('profundidadeProduto')->nullable();
            $table->string('unidadeMedida')->nullable();
            $table->integer('itensPorCaixa')->nullable();
            $table->integer('volumes')->nullable();
            $table->string('localizacao')->nullable();
            $table->string('crossdocking')->nullable();
            $table->string('condicao')->nullable();
            $table->string('freteGratis')->nullable();
            $table->string('producao')->nullable();
            $table->date('dataValidade')->nullable();
            $table->string('spedTipoItem')->nullable();

            $table->bigInteger('categoria_id')->unsigned()->nullable();
            $table->foreign('categoria_id')->references('id')->on('produtos_categorias')->onUpdate('cascade')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
