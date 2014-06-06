<?php

class EJade extends CViewRenderer {

    /**
     * @var string Jade template files extension.
     */
    public $fileExtension = '.jade';

    /**
     * @var Everzet\Jade\Jade instance of Jade parser
     */
    private $_jade;

    public function init() {
        Yii::app()->autoloader->getAutoloader()->addNamespace('Everzet\Jade', Yii::getPathOfAlias('Jade'))
        ->addNamespace('Everzet\Jade\Dumper', Yii::getPathOfAlias('Jade.Dumper'))
        ->addNamespace('Everzet\Jade\Visitor', Yii::getPathOfAlias('Jade.Visitor'))
        ->addNamespace('Everzet\Jade\Lexer', Yii::getPathOfAlias('Jade.Lexer'))
        ->addNamespace('Everzet\Jade\Filter', Yii::getPathOfAlias('Jade.Filter'));

        $dumper      = new Everzet\Jade\Dumper\PHPDumper();
        $dumper->registerVisitor('tag', new Everzet\Jade\Visitor\AutotagsVisitor());
        $dumper->registerFilter('javascript', new Everzet\Jade\Filter\JavaScriptFilter());
        $dumper->registerFilter('cdata', new Everzet\Jade\Filter\CDATAFilter());
        $dumper->registerFilter('php', new Everzet\Jade\Filter\PHPFilter());
        $dumper->registerFilter('style', new Everzet\Jade\Filter\CSSFilter());
        $parser      = new Everzet\Jade\Parser(new Everzet\Jade\Lexer\Lexer());
        $this->_jade = new Everzet\Jade\Jade($parser, $dumper);

        return parent::init();
    }

    /**
     * Parses the source view file and saves the results as another file.
     * @param string $sourceFile the source view file path
     * @param string $viewFile the resulting view file path
     */
    protected function generateViewFile($sourceFile, $viewFile) {
        file_put_contents($viewFile, $this->_jade->render($sourceFile));
    }

}
