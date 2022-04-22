<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Produtos Model
 *
 * @property \App\Model\Table\GrupotributacoesTable|\Cake\ORM\Association\BelongsTo $Grupotributacoes
 * @property \App\Model\Table\CategoriaProdutosTable|\Cake\ORM\Association\BelongsTo $CategoriaProdutos
 * @property \App\Model\Table\CfopsTable|\Cake\ORM\Association\BelongsTo $Cfops
 * @property \App\Model\Table\CstsTable|\Cake\ORM\Association\BelongsTo $Csts
 * @property \App\Model\Table\NcmsTable|\Cake\ORM\Association\BelongsTo $Ncms
 * @property \App\Model\Table\CestsTable|\Cake\ORM\Association\BelongsTo $Cests
 * @property \App\Model\Table\FabricantesTable|\Cake\ORM\Association\BelongsTo $Fabricantes
 * @property \App\Model\Table\FornecedoresTable|\Cake\ORM\Association\BelongsTo $Fornecedores
 * @property \App\Model\Table\UnidadesTable|\Cake\ORM\Association\BelongsTo $Unidades
 * @property \App\Model\Table\SubcategoriaProdutosTable|\Cake\ORM\Association\BelongsTo $SubcategoriaProdutos
 * @property \App\Model\Table\EmpresasTable|\Cake\ORM\Association\BelongsTo $Empresas
 *
 * @method \App\Model\Entity\Produto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Produto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Produto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Produto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Produto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Produto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Produto findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProdutosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('produtos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Grupotributacoes', [
            'foreignKey' => 'grupotributacoes_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CategoriaProdutos', [
            'foreignKey' => 'categoria_produtos_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Cfops', [
            'foreignKey' => 'cfops_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Csts', [
            'foreignKey' => 'csts_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Ncms', [
            'foreignKey' => 'ncms_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Cests', [
            'foreignKey' => 'cests_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Fabricantes', [
            'foreignKey' => 'fabricantes_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Fornecedores', [
            'foreignKey' => 'fornecedores_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Unidades', [
            'foreignKey' => 'unidades_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SubcategoriaProdutos', [
            'foreignKey' => 'subcategoria_produtos_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresas_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('codigo')
            ->maxLength('codigo', 50)
            ->allowEmpty('codigo');

        $validator
            ->scalar('referencia')
            ->maxLength('referencia', 50)
            ->allowEmpty('referencia');

        $validator
            ->scalar('codigo_barras')
            ->maxLength('codigo_barras', 15)
            ->allowEmpty('codigo_barras');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 120)
            ->allowEmpty('nome');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 120)
            ->allowEmpty('descricao');

        $validator
            ->scalar('pode_desconto')
            ->maxLength('pode_desconto', 1)
            ->allowEmpty('pode_desconto');

        $validator
            ->scalar('pode_fracionado')
            ->maxLength('pode_fracionado', 1)
            ->allowEmpty('pode_fracionado');

        $validator
            ->scalar('pode_balanca')
            ->maxLength('pode_balanca', 1)
            ->allowEmpty('pode_balanca');

        $validator
            ->scalar('pode_lote')
            ->maxLength('pode_lote', 1)
            ->allowEmpty('pode_lote');

        $validator
            ->scalar('pode_comissao')
            ->maxLength('pode_comissao', 1)
            ->allowEmpty('pode_comissao');

        $validator
            ->numeric('preco_compra')
            ->allowEmpty('preco_compra');

        $validator
            ->numeric('preco_custo')
            ->allowEmpty('preco_custo');

        $validator
            ->numeric('custo_medio')
            ->allowEmpty('custo_medio');

        $validator
            ->numeric('preco_venda')
            ->allowEmpty('preco_venda');

        $validator
            ->numeric('margem_lucro')
            ->allowEmpty('margem_lucro');

        $validator
            ->numeric('desconto_max')
            ->allowEmpty('desconto_max');

        $validator
            ->numeric('preco_venda2')
            ->allowEmpty('preco_venda2');

        $validator
            ->numeric('margem_lucro2')
            ->allowEmpty('margem_lucro2');

        $validator
            ->numeric('qtd_minimapv2')
            ->allowEmpty('qtd_minimapv2');

        $validator
            ->numeric('desconto_max2')
            ->allowEmpty('desconto_max2');

        $validator
            ->numeric('preco_venda3')
            ->allowEmpty('preco_venda3');

        $validator
            ->numeric('margem_lucro3')
            ->allowEmpty('margem_lucro3');

        $validator
            ->numeric('qtd_minimapv3')
            ->allowEmpty('qtd_minimapv3');

        $validator
            ->numeric('desconto_max3')
            ->allowEmpty('desconto_max3');

        $validator
            ->numeric('preco_venda4')
            ->allowEmpty('preco_venda4');

        $validator
            ->numeric('margem_lucro4')
            ->allowEmpty('margem_lucro4');

        $validator
            ->numeric('qtd_minimapv4')
            ->allowEmpty('qtd_minimapv4');

        $validator
            ->numeric('desconto_max4')
            ->allowEmpty('desconto_max4');

        $validator
            ->numeric('preco_antigo')
            ->allowEmpty('preco_antigo');

        $validator
            ->numeric('valor_frete')
            ->allowEmpty('valor_frete');

        $validator
            ->numeric('ipi')
            ->allowEmpty('ipi');

        $validator
            ->numeric('preco_promocao')
            ->allowEmpty('preco_promocao');

        $validator
            ->date('data_promocao')
            ->allowEmpty('data_promocao');

        $validator
            ->numeric('comissao')
            ->allowEmpty('comissao');

        $validator
            ->numeric('estoque')
            ->allowEmpty('estoque');

        $validator
            ->numeric('estoque_minimo')
            ->allowEmpty('estoque_minimo');

        $validator
            ->numeric('estoque_max')
            ->allowEmpty('estoque_max');

        $validator
            ->numeric('estoque_tara')
            ->allowEmpty('estoque_tara');

        $validator
            ->numeric('qtd_embalagem')
            ->allowEmpty('qtd_embalagem');

        $validator
            ->scalar('qtd_diasvalidade')
            ->maxLength('qtd_diasvalidade', 4)
            ->allowEmpty('qtd_diasvalidade');

        $validator
            ->numeric('peso_bruto')
            ->allowEmpty('peso_bruto');

        $validator
            ->numeric('peso_liquido')
            ->allowEmpty('peso_liquido');

        $validator
            ->scalar('tipo_produto')
            ->maxLength('tipo_produto', 10)
            ->allowEmpty('tipo_produto');

        $validator
            ->scalar('origem_produto')
            ->maxLength('origem_produto', 1)
            ->allowEmpty('origem_produto');

        $validator
            ->scalar('ex_tipi')
            ->maxLength('ex_tipi', 3)
            ->allowEmpty('ex_tipi');

        $validator
            ->scalar('ativo')
            ->maxLength('ativo', 1)
            ->allowEmpty('ativo');

        $validator
            ->scalar('observacoes')
            ->maxLength('observacoes', 4294967295)
            ->allowEmpty('observacoes');

        $validator
            ->scalar('foto')
            ->maxLength('foto', 120)
            ->allowEmpty('foto');

        $validator
            ->scalar('foto2')
            ->maxLength('foto2', 120)
            ->allowEmpty('foto2');

        $validator
            ->scalar('foto3')
            ->maxLength('foto3', 120)
            ->allowEmpty('foto3');

        $validator
            ->scalar('local')
            ->maxLength('local', 80)
            ->allowEmpty('local');

        $validator
            ->scalar('ref_cruzada1')
            ->maxLength('ref_cruzada1', 50)
            ->allowEmpty('ref_cruzada1');

        $validator
            ->scalar('ref_cruzada2')
            ->maxLength('ref_cruzada2', 50)
            ->allowEmpty('ref_cruzada2');

        $validator
            ->scalar('ref_cruzada3')
            ->maxLength('ref_cruzada3', 50)
            ->allowEmpty('ref_cruzada3');

        $validator
            ->scalar('ref_cruzada4')
            ->maxLength('ref_cruzada4', 50)
            ->allowEmpty('ref_cruzada4');

        $validator
            ->scalar('ref_cruzada5')
            ->maxLength('ref_cruzada5', 50)
            ->allowEmpty('ref_cruzada5');

        $validator
            ->scalar('ref_cruzada6')
            ->maxLength('ref_cruzada6', 50)
            ->allowEmpty('ref_cruzada6');

        $validator
            ->scalar('cod_ean')
            ->maxLength('cod_ean', 14)
            ->allowEmpty('cod_ean');

        $validator
            ->scalar('codigo_med')
            ->maxLength('codigo_med', 13)
            ->allowEmpty('codigo_med');

        $validator
            ->scalar('tipo_med')
            ->maxLength('tipo_med', 12)
            ->allowEmpty('tipo_med');

        $validator
            ->scalar('tabela_med')
            ->maxLength('tabela_med', 12)
            ->allowEmpty('tabela_med');

        $validator
            ->scalar('linha_med')
            ->maxLength('linha_med', 10)
            ->allowEmpty('linha_med');

        $validator
            ->scalar('ref_anvisa_med')
            ->maxLength('ref_anvisa_med', 4)
            ->allowEmpty('ref_anvisa_med');

        $validator
            ->scalar('portaria_med')
            ->maxLength('portaria_med', 3)
            ->allowEmpty('portaria_med');

        $validator
            ->scalar('rms_med')
            ->maxLength('rms_med', 17)
            ->allowEmpty('rms_med');

        $validator
            ->date('data_vigencia_med')
            ->allowEmpty('data_vigencia_med');

        $validator
            ->scalar('edicao_pharmacos')
            ->maxLength('edicao_pharmacos', 6)
            ->allowEmpty('edicao_pharmacos');

        $validator
            ->scalar('comb_cprodanp')
            ->maxLength('comb_cprodanp', 10)
            ->allowEmpty('comb_cprodanp');

        $validator
            ->scalar('comb_descanp')
            ->maxLength('comb_descanp', 100)
            ->allowEmpty('comb_descanp');

        $validator
            ->scalar('med_classeterapeutica')
            ->maxLength('med_classeterapeutica', 18)
            ->allowEmpty('med_classeterapeutica');

        $validator
            ->scalar('med_unidademedida')
            ->maxLength('med_unidademedida', 7)
            ->allowEmpty('med_unidademedida');

        $validator
            ->scalar('med_usoprolongado')
            ->maxLength('med_usoprolongado', 3)
            ->allowEmpty('med_usoprolongado');

        $validator
            ->scalar('med_podeatualizar')
            ->maxLength('med_podeatualizar', 1)
            ->allowEmpty('med_podeatualizar');

        $validator
            ->numeric('med_precovendafpop')
            ->allowEmpty('med_precovendafpop');

        $validator
            ->numeric('med_margemfpop')
            ->allowEmpty('med_margemfpop');

        $validator
            ->numeric('med_apresentacaofpop')
            ->allowEmpty('med_apresentacaofpop');

        $validator
            ->numeric('trib_issaliqsaida')
            ->allowEmpty('trib_issaliqsaida');

        $validator
            ->numeric('trib_icmsaliqsaida')
            ->allowEmpty('trib_icmsaliqsaida');

        $validator
            ->numeric('trib_icmsaliqredbasecalcsaida')
            ->allowEmpty('trib_icmsaliqredbasecalcsaida');

        $validator
            ->scalar('trib_icmsobs')
            ->maxLength('trib_icmsobs', 80)
            ->allowEmpty('trib_icmsobs');

        $validator
            ->numeric('trib_icmsaliqentrada')
            ->allowEmpty('trib_icmsaliqentrada');

        $validator
            ->numeric('trib_icmsaliqredbasecalcentrada')
            ->allowEmpty('trib_icmsaliqredbasecalcentrada');

        $validator
            ->numeric('trib_icmsfcpaliq')
            ->allowEmpty('trib_icmsfcpaliq');

        $validator
            ->scalar('trib_ipisaida')
            ->maxLength('trib_ipisaida', 2)
            ->allowEmpty('trib_ipisaida');

        $validator
            ->numeric('trib_ipialiqsaida')
            ->allowEmpty('trib_ipialiqsaida');

        $validator
            ->scalar('trib_ipientrada')
            ->maxLength('trib_ipientrada', 2)
            ->allowEmpty('trib_ipientrada');

        $validator
            ->numeric('trib_ipialiqentrada')
            ->allowEmpty('trib_ipialiqentrada');

        $validator
            ->scalar('trib_pissaida')
            ->maxLength('trib_pissaida', 2)
            ->allowEmpty('trib_pissaida');

        $validator
            ->numeric('trib_pisaliqsaida')
            ->allowEmpty('trib_pisaliqsaida');

        $validator
            ->scalar('trib_pisentrada')
            ->maxLength('trib_pisentrada', 2)
            ->allowEmpty('trib_pisentrada');

        $validator
            ->numeric('trib_pisaliqentrada')
            ->allowEmpty('trib_pisaliqentrada');

        $validator
            ->scalar('trib_cofinssaida')
            ->maxLength('trib_cofinssaida', 2)
            ->allowEmpty('trib_cofinssaida');

        $validator
            ->numeric('trib_cofinsaliqsaida')
            ->allowEmpty('trib_cofinsaliqsaida');

        $validator
            ->scalar('trib_cofinsentrada')
            ->maxLength('trib_cofinsentrada', 2)
            ->allowEmpty('trib_cofinsentrada');

        $validator
            ->numeric('trib_cofinsaliqentrada')
            ->allowEmpty('trib_cofinsaliqentrada');

        $validator
            ->scalar('trib_genero')
            ->maxLength('trib_genero', 3)
            ->allowEmpty('trib_genero');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['grupotributacoes_id'], 'Grupotributacoes'));
        $rules->add($rules->existsIn(['categoria_produtos_id'], 'CategoriaProdutos'));
        $rules->add($rules->existsIn(['cfops_id'], 'Cfops'));
        $rules->add($rules->existsIn(['csts_id'], 'Csts'));
        $rules->add($rules->existsIn(['ncms_id'], 'Ncms'));
        $rules->add($rules->existsIn(['cests_id'], 'Cests'));
        $rules->add($rules->existsIn(['fabricantes_id'], 'Fabricantes'));
        $rules->add($rules->existsIn(['fornecedores_id'], 'Fornecedores'));
        $rules->add($rules->existsIn(['unidades_id'], 'Unidades'));
        $rules->add($rules->existsIn(['subcategoria_produtos_id'], 'SubcategoriaProdutos'));
        $rules->add($rules->existsIn(['empresas_id'], 'Empresas'));

        return $rules;
    }
}
