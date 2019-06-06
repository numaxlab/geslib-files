<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\ArticleIndex;
use PHPUnit\Framework\TestCase;

class ArticleIndexTest extends TestCase
{

    public function testFromLine()
    {
        $articleIndex = ArticleIndex::fromLine([
            '6I', '34326', '1', 'Prefacio <BR>	CAPÍTULO 1. TRAYECTORIAS DEL DESARROLLO DEL SECTOR VITIVINÍCOLA EN ESPAÑA por Hans-Jürgen Puhle<BR>	CAPÍTULO II. UNA HISTORIA SOCIAL DEL VINO EN LA RIOJA Y EN NAVARRA por Ludger Mees<BR>	CAPÍTULO III. Una historia social del vino en Cataluña por Klaus-Jürgen Nagel<BR>	CAPÍTULO IV. CONTINUIDADES Y PERSPECTIVAS por Hans-Jürgen Puhle<BR>	Siglas<BR>	Fuentes y bibliografía<BR>	Anexos'
        ]);

        $this->assertEquals('34326', $articleIndex->articleId());
        $this->assertEquals(1, $articleIndex->count());
        $this->assertIsString($articleIndex->value());
    }
}
