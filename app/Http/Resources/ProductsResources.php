<?php

    namespace App\Http\Resources;

    use Illuminate\Http\Resources\Json\JsonResource;
    use App\Http\Resources\CategoryProductsCollection;

    Class ProductsResources extends JsonResource
    {
        /**
         * Transfor json response in to array
         */
        public function toArray($request): array
        {
            return [
                'id'                    => $this->id,
                'codigo'                => $this->codigo,
                'descricao'             => $this->descricao,
                'tipo'                  => $this->tipo,
                'situacao'              => $this->situacao,
                'unidade'               => $this->unidade,
                'preco'                 => $this->preco,
                'precoCusto'            => $this->precoCusto,
                'descricaoCurta'        => $this->descricaoCurta,
                'descricaoComplementar' => $this->descricaoComplementar,
                'dataInclusao'          => $this->dataInclusao,
                'dataAlteracao'         => $this->dataAlteracao,
                'imageThumbnail'        => $this->imageThumbnail,
                'urlVideo'              => $this->urlVideo,
                'nomeFornecedorc'       => $this->nomeFornecedorc,
                'codigoFabricante'      => $this->codigoFabricante,
                'marca'                 => $this->marca,
                'class_fiscal'          => $this->class_fiscal,
                'cest'                  => $this->cest,
                'origem'                => $this->origem,
                'idGrupoProduto'        => $this->idGrupoProduto,
                'linkExterno'           => $this->linkExterno,
                'observacoes'           => $this->observacoes,
                'grupoProduto'          => $this->grupoProduto,
                'garantia'              => $this->garantia,
                'descricaoFornecedor'   => $this->descricaoFornecedor,
                'idFaabricante'         => $this->idFaabricante,
                'pesoLiq'               => $this->pesoLiq,
                'pesoBruto'             => $this->pesoBruto,
                'estoqueMinimo'         => $this->estoqueMinimo,
                'estoqueMaximo'         => $this->estoqueMaximo,
                'gtin'                  => $this->gtin,
                'gtinEmbalagem'         => $this->gtinEmbalagem,
                'larguraProduto'        => $this->larguraProduto,
                'alturaProduto'         => $this->alturaProduto,
                'profundidadeProduto'   => $this->profundidadeProduto,
                'unidadeMedida'         => $this->unidadeMedida,
                'itensPorCaixa'         => $this->itensPorCaixa,
                'volumes'               => $this->volumes,
                'localizacao'           => $this->localizacao,
                'crossdocking'          => $this->crossdocking,
                'condicao'              => $this->condicao,
                'freteGratis'           => $this->freteGratis,
                'producao'              => $this->producao,
                'dataValidade'          => $this->dataValidade,
                'spedTipoItem'          => $this->spedTipoItem,
                'categoria_id'          => $this->categoria_id,
                'categoria'             => new CategoryProductsCollection($this->categoria),
            ];
        }
    }
