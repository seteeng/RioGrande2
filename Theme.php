<?php
namespace RioGrande;
//@import '../../../../BaseV1/assets/css/sass/main';
use MapasCulturais\Themes\BaseV1;
use MapasCulturais\App;

class Theme extends BaseV1\Theme{

    protected static function _getTexts(){
        $app = App::i();
        $self = $app->view;
        $url_search_agents = $self->searchAgentsUrl;
        $url_search_spaces = $self->searchSpacesUrl;
        $url_search_events = $self->searchEventsUrl;
        $url_search_projects = $self->searchProjectsUrl;

        return [
            'site: name' => 'Rio Grande', //App::i()->config['app.siteName'],
            'site: description' => 'SECULT', //App::i()->config['app.siteDescription'],
            'site: in the region' => 'na região do Rio Grande',
            'site: of the region' => 'da região do Rio Grande',
            'site: owner' => 'Secretaria de Município da Cultura de Rio Grande',
            'site: by the site owner' => 'pela Secretaria de Município da Cultura de Rio Grande',

            'home: title' => "Bem-vind@s ao <b>MAPA DA CULTURA</b> de Rio Grande!", //. App::i()->config['app.siteName'],
            'home: abbreviation' => "SECULT",
            'home: colabore' => "Colabore com o Mapas Culturais",
            'home: welcome' => "<p align='justify'>Rio Grande é uma cidade reconhecida por sua diversidade cultural, representada em suas festas populares, 
				seus prédios históricos, seu patrimônio natural, suas comunidades tradicionais e sua intensa produção cultural no 
				artesanato, música, teatro, dança, entre tantas outras manifestações artísticas. Para dar visibilidade para 
				a essa diversidade, a Prefeitura Municipal do Rio Grande, através da Secretaria de Município de Cultura criou o 
				projeto <b>Mapa da Cultura</b>, uma plataforma colaborativa para mapeamento de pessoas, coletivos, grupos, entidades, 
				editais, projetos, espaços e iniciativas independentes de todas as manifestações culturais. Participe cadastrando-se 
				e contribua para a construção coletiva dessa importante ferramenta.</p>",
            'home: events' => "Você pode pesquisar eventos culturais nos campos de busca combinada. Como usuário cadastrado, você pode incluir seus eventos na plataforma e divulgá-los gratuitamente.",
            'home: agents' => "Você pode colaborar na gestão da cultura com suas próprias informações, preenchendo seu perfil de agente cultural. Neste espaço, estão registrados artistas, gestores e produtores; uma rede de atores envolvidos na cena cultural da região. Você pode cadastrar um ou mais agentes (grupos, coletivos, bandas instituições, empresas, etc.), além de associar ao seu perfil eventos e espaços culturais com divulgação gratuita.",
            'home: spaces' => "Procure por espaços culturais incluídos na plataforma, acessando os campos de busca combinada que ajudam na precisão de sua pesquisa. Cadastre também os espaços onde desenvolve suas atividades artísticas e culturais.",
            'home: projects' => "Reúne projetos culturais ou agrupa eventos de todos os tipos. Neste espaço, você encontra leis de fomento, mostras, convocatórias e editais criados, além de diversas iniciativas cadastradas pelos usuários da plataforma. Cadastre-se e divulgue seus projetos.",
            'home: home_devs' => 'Existem algumas maneiras de desenvolvedores interagirem com o Mapas Culturais. A primeira é através da nossa <a href="https://github.com/hacklabr/mapasculturais/blob/master/documentation/docs/mc_config_api.md" target="_blank">API</a>. Com ela você pode acessar os dados públicos no nosso banco de dados e utilizá-los para desenvolver aplicações externas. Além disso, o Mapas Culturais é construído a partir do sofware livre <a href="http://institutotim.org.br/project/mapas-culturais/" target="_blank">Mapas Culturais</a>, criado em parceria com o <a href="http://institutotim.org.br" target="_blank">Instituto TIM</a>, e você pode contribuir para o seu desenvolvimento através do <a href="https://github.com/hacklabr/mapasculturais/" target="_blank">GitHub</a>.',

            'search: verified results' => 'Resultados da Prefeitura',
            'search: verified' => 'Verificados'
        ];
    }

    static function getThemeFolder() {
        return __DIR__;
    }

    function _init() {
        parent::_init();
        $app = App::i();
        $app->hook('view.render(<<*>>):before', function() use($app) {
            $this->_publishAssets();
        });
    }

    protected function _publishAssets() {
        $this->jsObject['assets']['logo-instituicao'] = $this->asset('img/logo-instituicao.png', false);
//	$this->jsObject['assets']['fundo'] = $this->asset('img/fundo.png', false);
    }

}
