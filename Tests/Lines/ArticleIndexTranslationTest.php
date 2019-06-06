<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\ArticleIndexTranslation;
use PHPUnit\Framework\TestCase;

class ArticleIndexTranslationTest extends TestCase
{

    public function testFromLine()
    {
        $articleIndexTranslation = ArticleIndexTranslation::fromLine([
            '6TI', '34326', '001', '1', 'Prefacio <BR>	CAPÍTULO 1. TRAYECTORIAS DEL DESARROLLO DEL SECTOR VITIVINÍCOLA EN ESPAÑA por Hans-Jürgen Puhle<BR>	CAPÍTULO II. UNA HISTORIA SOCIAL DEL VINO EN LA RIOJA Y EN NAVARRA por Ludger Mees<BR>	CAPÍTULO III. Una historia social del vino en Cataluña por Klaus-Jürgen Nagel<BR>	CAPÍTULO IV. CONTINUIDADES Y PERSPECTIVAS por Hans-Jürgen Puhle<BR>	Siglas<BR>	Fuentes y bibliografía<BR>	Anexos'
        ]);

        $this->assertEquals('34326', $articleIndexTranslation->articleId());
        $this->assertEquals('001', $articleIndexTranslation->languageId());
        $this->assertEquals(1, $articleIndexTranslation->count());
        $this->assertIsString($articleIndexTranslation->value());
    }
}
