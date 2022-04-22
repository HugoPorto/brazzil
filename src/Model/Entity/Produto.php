<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Produto Entity
 *
 * @property int $id
 * @property string $codigo
 * @property string $referencia
 * @property string $codigo_barras
 * @property string $nome
 * @property string $descricao
 * @property int $grupotributacoes_id
 * @property int $categoria_produtos_id
 * @property int $cfops_id
 * @property int $csts_id
 * @property int $ncms_id
 * @property int $cests_id
 * @property int $fabricantes_id
 * @property int $fornecedores_id
 * @property int $unidades_id
 * @property int $subcategoria_produtos_id
 * @property int $empresas_id
 * @property string $pode_desconto
 * @property string $pode_fracionado
 * @property string $pode_balanca
 * @property string $pode_lote
 * @property string $pode_comissao
 * @property float $preco_compra
 * @property float $preco_custo
 * @property float $custo_medio
 * @property float $preco_venda
 * @property float $margem_lucro
 * @property float $desconto_max
 * @property float $preco_venda2
 * @property float $margem_lucro2
 * @property float $qtd_minimapv2
 * @property float $desconto_max2
 * @property float $preco_venda3
 * @property float $margem_lucro3
 * @property float $qtd_minimapv3
 * @property float $desconto_max3
 * @property float $preco_venda4
 * @property float $margem_lucro4
 * @property float $qtd_minimapv4
 * @property float $desconto_max4
 * @property float $preco_antigo
 * @property float $valor_frete
 * @property float $ipi
 * @property float $preco_promocao
 * @property \Cake\I18n\FrozenDate $data_promocao
 * @property float $comissao
 * @property float $estoque
 * @property float $estoque_minimo
 * @property float $estoque_max
 * @property float $estoque_tara
 * @property float $qtd_embalagem
 * @property string $qtd_diasvalidade
 * @property float $peso_bruto
 * @property float $peso_liquido
 * @property string $tipo_produto
 * @property string $origem_produto
 * @property string $ex_tipi
 * @property string $ativo
 * @property string $observacoes
 * @property string $foto
 * @property string $foto2
 * @property string $foto3
 * @property string $local
 * @property string $ref_cruzada1
 * @property string $ref_cruzada2
 * @property string $ref_cruzada3
 * @property string $ref_cruzada4
 * @property string $ref_cruzada5
 * @property string $ref_cruzada6
 * @property string $cod_ean
 * @property string $codigo_med
 * @property string $tipo_med
 * @property string $tabela_med
 * @property string $linha_med
 * @property string $ref_anvisa_med
 * @property string $portaria_med
 * @property string $rms_med
 * @property \Cake\I18n\FrozenDate $data_vigencia_med
 * @property string $edicao_pharmacos
 * @property string $comb_cprodanp
 * @property string $comb_descanp
 * @property string $med_classeterapeutica
 * @property string $med_unidademedida
 * @property string $med_usoprolongado
 * @property string $med_podeatualizar
 * @property float $med_precovendafpop
 * @property float $med_margemfpop
 * @property float $med_apresentacaofpop
 * @property float $trib_issaliqsaida
 * @property float $trib_icmsaliqsaida
 * @property float $trib_icmsaliqredbasecalcsaida
 * @property string $trib_icmsobs
 * @property float $trib_icmsaliqentrada
 * @property float $trib_icmsaliqredbasecalcentrada
 * @property float $trib_icmsfcpaliq
 * @property string $trib_ipisaida
 * @property float $trib_ipialiqsaida
 * @property string $trib_ipientrada
 * @property float $trib_ipialiqentrada
 * @property string $trib_pissaida
 * @property float $trib_pisaliqsaida
 * @property string $trib_pisentrada
 * @property float $trib_pisaliqentrada
 * @property string $trib_cofinssaida
 * @property float $trib_cofinsaliqsaida
 * @property string $trib_cofinsentrada
 * @property float $trib_cofinsaliqentrada
 * @property string $trib_genero
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Grupotributaco $grupotributaco
 * @property \App\Model\Entity\CategoriaProduto $categoria_produto
 * @property \App\Model\Entity\Cfop $cfop
 * @property \App\Model\Entity\Cst $cst
 * @property \App\Model\Entity\Ncm $ncm
 * @property \App\Model\Entity\Cest $cest
 * @property \App\Model\Entity\Fabricante $fabricante
 * @property \App\Model\Entity\Fornecedore $fornecedore
 * @property \App\Model\Entity\Unidade $unidade
 * @property \App\Model\Entity\SubcategoriaProduto $subcategoria_produto
 * @property \App\Model\Entity\Empresa $empresa
 */
class Produto extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'codigo' => true,
        'referencia' => true,
        'codigo_barras' => true,
        'nome' => true,
        'descricao' => true,
        'grupotributacoes_id' => true,
        'categoria_produtos_id' => true,
        'cfops_id' => true,
        'csts_id' => true,
        'ncms_id' => true,
        'cests_id' => true,
        'fabricantes_id' => true,
        'fornecedores_id' => true,
        'unidades_id' => true,
        'subcategoria_produtos_id' => true,
        'empresas_id' => true,
        'pode_desconto' => true,
        'pode_fracionado' => true,
        'pode_balanca' => true,
        'pode_lote' => true,
        'pode_comissao' => true,
        'preco_compra' => true,
        'preco_custo' => true,
        'custo_medio' => true,
        'preco_venda' => true,
        'margem_lucro' => true,
        'desconto_max' => true,
        'preco_venda2' => true,
        'margem_lucro2' => true,
        'qtd_minimapv2' => true,
        'desconto_max2' => true,
        'preco_venda3' => true,
        'margem_lucro3' => true,
        'qtd_minimapv3' => true,
        'desconto_max3' => true,
        'preco_venda4' => true,
        'margem_lucro4' => true,
        'qtd_minimapv4' => true,
        'desconto_max4' => true,
        'preco_antigo' => true,
        'valor_frete' => true,
        'ipi' => true,
        'preco_promocao' => true,
        'data_promocao' => true,
        'comissao' => true,
        'estoque' => true,
        'estoque_minimo' => true,
        'estoque_max' => true,
        'estoque_tara' => true,
        'qtd_embalagem' => true,
        'qtd_diasvalidade' => true,
        'peso_bruto' => true,
        'peso_liquido' => true,
        'tipo_produto' => true,
        'origem_produto' => true,
        'ex_tipi' => true,
        'ativo' => true,
        'observacoes' => true,
        'foto' => true,
        'foto2' => true,
        'foto3' => true,
        'local' => true,
        'ref_cruzada1' => true,
        'ref_cruzada2' => true,
        'ref_cruzada3' => true,
        'ref_cruzada4' => true,
        'ref_cruzada5' => true,
        'ref_cruzada6' => true,
        'cod_ean' => true,
        'codigo_med' => true,
        'tipo_med' => true,
        'tabela_med' => true,
        'linha_med' => true,
        'ref_anvisa_med' => true,
        'portaria_med' => true,
        'rms_med' => true,
        'data_vigencia_med' => true,
        'edicao_pharmacos' => true,
        'comb_cprodanp' => true,
        'comb_descanp' => true,
        'med_classeterapeutica' => true,
        'med_unidademedida' => true,
        'med_usoprolongado' => true,
        'med_podeatualizar' => true,
        'med_precovendafpop' => true,
        'med_margemfpop' => true,
        'med_apresentacaofpop' => true,
        'trib_issaliqsaida' => true,
        'trib_icmsaliqsaida' => true,
        'trib_icmsaliqredbasecalcsaida' => true,
        'trib_icmsobs' => true,
        'trib_icmsaliqentrada' => true,
        'trib_icmsaliqredbasecalcentrada' => true,
        'trib_icmsfcpaliq' => true,
        'trib_ipisaida' => true,
        'trib_ipialiqsaida' => true,
        'trib_ipientrada' => true,
        'trib_ipialiqentrada' => true,
        'trib_pissaida' => true,
        'trib_pisaliqsaida' => true,
        'trib_pisentrada' => true,
        'trib_pisaliqentrada' => true,
        'trib_cofinssaida' => true,
        'trib_cofinsaliqsaida' => true,
        'trib_cofinsentrada' => true,
        'trib_cofinsaliqentrada' => true,
        'trib_genero' => true,
        'created' => true,
        'modified' => true,
        'grupotributaco' => true,
        'categoria_produto' => true,
        'cfop' => true,
        'cst' => true,
        'ncm' => true,
        'cest' => true,
        'fabricante' => true,
        'fornecedore' => true,
        'unidade' => true,
        'subcategoria_produto' => true,
        'empresa' => true
    ];
}
