<div id="BeginnerLesson3x3" class="container-fluid bg-white p-2">
  <div class="row w-100">
    <div class="col-12 text-center">
      <h1 class="pt-3">Comment résoudre un Rubik's Cube 3x3</h1>
      <h2>- Méthode débutant -</h2>
      <hr>
    </div>
    <div class="col-9 mx-auto text-justify">
      <h4 class="text-center font-weight-bold pb-2">Le fonctionnement du cube</h4>
      <p>Le cube se compose de seulement trois pièces différentes. Les huits coins du cube, composés de trois couleurs différentes; les douze arêtes composées de deux couleurs différentes et les six centres d’une seule couleur. Les centres, ne peuvent pas être mélangés, jaune sera toujours opposé à blanc, bleu à vert, et rouge à orange. Ils définissent donc la couleur de toute la face.</p>
      <div class="roofpig-container">
        <img class="roofpig-picture" src="../assets/img/3x3_centers_only.png" alt="3x3 seulement avec les centres">
        <img class="roofpig-picture" src="../assets/img/3x3_corners_only.png" alt="3x3 seulement avec les coins">
        <img class="roofpig-picture" src="../assets/img/3x3_edges_only.png" alt="3x3 seulement avec les arêtes">
      </div>
      <p>Suivant la logique des couleurs du cubes, il n’existe pas d’arête jaune/blanche, car les arêtes sont composées de couleurs adjacentes et ces deux couleurs sont opposées. De même, il n’existe pas de coin bleu/vert/jaune par exemple, car la face bleue et la face verte ne seront jamais adjacentes.</p>
      <p>Le cube se décompose donc en faces, groupées par couleur. Le cube peut être manipulé en tournant les côtés droit, gauche, haut, bas, à l’avant et à l’arrière; ce qui permet de le résoudre étape par étape et de savoir quelle face tourner dans quel sens à tout moment.</p>
      <p>Pour résoudre le cube, il faut le découper en ” couche “, du bas vers le haut. Nous devons suivre des étapes qui vont résoudre la première couche correctement, puis la couche du “ milieu “ du cube, et enfin la dernière face sans déranger ce qu’on a déjà créé.</p>
      <div class="roofpig-container">
        <img class="roofpig-picture" src="../assets/img/3x3_first_layer.png" alt="3x3 première couche">
        <img class="roofpig-picture" src="../assets/img/3x3_F2L.png" alt="3x3 deux premières couches">
        <img class="roofpig-picture" src="../assets/img/3x3_solved.png" alt="3x3 résolu">
      </div>
      <hr>
    </div>
    <div class="col-9 mx-auto text-justify">
      <h4 class="text-center font-weight-bold">La croix Blanche</h4>
      <p>Tout d’abord, tenez la face blanche vers le haut, peu importe couleur que vous avez face à vous ( en général, vert est utilisé ). Nous allons correctement installer les quatres arêtes blanches, de façon à ce qu’elles créer des lignes entre la face blanche et les autres faces colorées.</p>
      <div class="roofpig-container">
        <img class="roofpig-picture" src="../assets/img/3x3_correct_cross.png" alt="3x3 croix correct">
        <img class="roofpig-picture" src="../assets/img/3x3_wrong_cross.png" alt="3x3 croix incorrect">
      </div>
      <p>Je vous donnes quelques suites de mouvements qui peuvent vous aider dans certains cas complexes, mais en général, cette étape est assez intuitive. Concentrez vous bien sur les centres autour de la face blanche, car ce sont eux qui vont décider de la couleur connectée à la face blanche.</p>
      <div class="roofpig-container">
        <div class="roofpig" data-config="colored=D*/e F B R L D|alg=U' F2|speed=1000|hover=none|pov=Dfl"></div>
        <div class="roofpig" data-config="colored=D*/e F B R L D|alg=U L F' L'|speed=1000|hover=none|pov=Dfl"></div>
        <div class="roofpig" data-config="colored=D*/e F B R L D|alg=F D' L D|speed=1000|hover=none|pov=Dfl"></div>
      </div>
      <p>Une fois la croix bien créée, vous pouvez retourner le cube face jaune vers le haut, car la plupart des mouvements des prochaines étapes sont bien plus facile dans ce sens ( et fixer une face résolue ne nous sert pas à grand chose )</p>
      <hr>
    </div>
    <div class="col-9 mx-auto text-justify">
      <h4 class="text-center font-weight-bold">Quatre coins blancs</h4>
      <p>L’étape suivante à la croix sert à terminer la face blanche. Ils faut insérer les quatre coins possédant un côté blanc aux bons endroits autour de la croix blanche. Je vous conseille maintenant de retourner votre cube pour avoir la face Jaune qui pointe vers le haut. Les algorithmes seront plus facile à exécuter. Pour réussir cette étape, il suffit de suivre une simple suite de quatre mouvements !</p>
      <div class="roofpig-container">
        <img class="roofpig-picture" src="../assets/img/3x3_simple_first_layer.png" alt="3x3 première couche">
      </div>
      <p>En premier, trouvez un coin avec un côté blanc sur la face jaune ( assurez vous que le coin est à côté du centre jaune ), ensuite, placez là au dessus de sa place sur la face blanche. Enfin, tourner le cube de la façon démontré ci dessous jusqu’à ce que le coin soit bien orienté et au bon endroit.</p>
      <p>Une bonne façon de savoir si vous exécutez bien cette étape est de compter combien de fois vous faites ces quatres mouvements : un coin sera à sa place et bien orienté en cinq répétitions maximum, si vous en faites plus et que vous n’arrivez toujours pas au résultat que vous voulez, c’est que vous tourner les faces incorrectement.</p>
      <div class="roofpig-container">
        <div class="roofpig" data-config="colored=D*/e D*/c */m|alg=R U R'|speed=1000|hover=none|flags=showalg"></div>
        <div class="roofpig" data-config="colored=D*/e D*/c */m|alg=R U R' U' R U R'|speed=750|hover=none|flags=showalg"></div>
      </div>
      <p>Si malheureusement un coin est bloqué au mauvais endroit ou mal orienté, vous pouvez simplement exécuter les quatre mouvements au dessus de ce coin et il sortira de son endroit, où vous pourrez continuer comme prévu.</p>
      <hr>
    </div>
    <div class="col-9 mx-auto text-justify">
      <h4 class="text-center font-weight-bold">La couche du milieu</h4>
      <p>Maintenant que vous avez toute la face blanche de résolue, il nous fait installer les arêtes ne comportant Pas de couleur jaune entre les centres de nos faces. Il vous faut ensuite associer une de ces arête avec le centre de sa couleur sur le côté.</p>
      <div class="roofpig-container">
        <img class="roofpig-picture" src="../assets/img/3x3_correct_edge_pairing.png" alt="3x3 arête correctement préparée">
        <img class="roofpig-picture" src="../assets/img/3x3_wrong_edge_pairing.png" alt="3x3 arête incorrectement préparée">
      </div>
      <p> Une fois fait, nous pouvons nous retrouver dans deux cas différents, soit la pièce doit être insérée vers la droite, soit vers la gauche. Dans les deux cas, nous allons utiliser la même suite de mouvement, sauf qu’on en fera une avec la main droite, et l’autre avec la main gauche.</p>
      <div class="roofpig-container">
        <div class="roofpig" data-config="colored=D*/e D*/c */m FR|alg=U R U' R' U' F' U F|speed=1000|hover=none|flags=showalg"></div>
        <div class="roofpig" data-config="colored=D*/e D*/c */m FL|alg=U' L' U L U F U' F'|speed=1000|hover=none|flags=showalg|pov=Ufl"></div>
      </div>
      <p>SI vous avez une arête déjà placée dans la couche du milieu mais au mauvais endroit ou mal orientée, vous pouvez réaliser cette suite de mouvement pour enlever l’arête mais garder le coin en dessous.</p>
      <div class="roofpig-container">
        <div class="roofpig" data-config="colored=D*/e D*/c */m FU|tweaks=R:Uf F:Fu|alg=R U' R' U' F' U F U2|speed=1000|hover=none|flags=showalg"></div>
      </div>
      <hr>
    </div>
    <div class="col-9 mx-auto text-justify">
      <h4 class="text-center font-weight-bold">La croix jaune</h4>
      <p>Nous avons déjà résolu la plus grande partie du cube et il ne nous reste que quelques étapes avant de l’avoir entièrement résolu !</p>
      <p>La première chose à faire une fois que les deux premières couches sont résolues est de créer une croix jaune avec les arêtes de la face jaune. Une fois à cette étape, vous pouvez vous retrouver dans quatre cas différents; en fixant les arêtes avec un côté jaune et le centre jaune, vous pouvez voir un point, un “ L “, une barre ou une croix.</p>
      <div class="roofpig-container">
        <img class="roofpig-picture" src="../assets/img/3x3_OLL_dot.png" alt="3x3 point jaune">
        <img class="roofpig-picture" src="../assets/img/3x3_OLL_L.png" alt="3x3 L jaune">
        <img class="roofpig-picture" src="../assets/img/3x3_OLL_line.png" alt="3x3 ligne jaune">
        <img class="roofpig-picture" src="../assets/img/3x3_OLL_cross.png" alt="3x3 croix jaune">
      </div>
      <p>Si vous avez une croix, parfait, vous pouvez passer à l’étape suivante; mais vous n’aurez pas autant de chance la prochaine fois !</p>
      <p>Si vous vous retrouver dans les autres cas, il vous faut suivre une seule suite de mouvements pour la créer, il faudra juste modifier le nombre de fois où il faudra répéter ces mouvements. Dès que vous avez votre croix jaune, vous pouvez continuer.</p>
      <div class="roofpig-container">
        <div class="roofpig" data-config="colored=U Ul Ub Ur Uf|solved=U-|alg=F R U R' U' F'|speed=1000|hover=none|flags=showalg"></div>
        <div class="roofpig" data-config="colored=U Ul Ub Ur Uf|solved=U-|alg=F R U R' U' F' F R U R' U' F'|speed=1000|hover=none|flags=showalg"></div>
      </div>
      <hr>
    </div>
    <div class="col-9 mx-auto text-justify">
      <h4 class="text-center font-weight-bold">Positionner les arêtes correctement</h4>
      <p>La croix jaune correctement construit, il faut maintenant aligner ses branches aux bonnes couleurs sur le cube. Vous pouvez faire face à trois cas différents; les branches déjà alignées ( parfait, avancé à la prochaine étape ), des arêtes résolues opposées ou des arêtes résolues adjacentes.</p>
      <p>Si vous pouvez connecter deux arêtes à leur couleur respective, c’est parfait, vous pouvez appliquer une seule suite de mouvement pour résoudre cette étape.</p>
      <div class="roofpig-container">
        <img class="roofpig-picture" src="../assets/img/3x3_PLL_good_cross.png" alt="3x3 croix jaune bien orientée">
        <img class="roofpig-picture" src="../assets/img/3x3_PLL_bad_cross.png" alt="3x3 croix jaune mal orientée">
      </div>
      <p>Si vous avez deux arêtes l’une à côté de l’autre, et que leur couleur autre que Jaune correspondent au couleurs des centres, alors vous pouvez appliquer la suite de mouvement si dessous. Attention, comme cet algorithme échange les arêtes face à vous et à votre gauche, il faut que vous placiez les arêtes résolues à l’arrière et sur votre droite, afin qu’elles soient conservées.</p>
      <div class="roofpig-container">
        <div class="roofpig" data-config="colored=U U*/e U-|alg=y2 y2 R U R' U R U2 R' U|speed=1000|flags=showalg|hover=none|pov=Ufl"></div>
      </div>
      <p>Si vous avez deux arêtes similaires mais à chaque côtés opposés du cube, vous pouvez appliquer ces mouvements une première fois dans n’importe quel sens, puis trouver les arêtes adjacentes et suivre la méthode présentée précédemment.</p>
      <hr>
    </div>
    <div class="col-9 mx-auto text-justify">
      <h4 class="text-center font-weight-bold">Positionner les coins correctement</h4>
      <p>Nous sommes à deux étapes de la fin du cube. Nous n’avons plus qu’à nous occuper des coins de la face jaune. Tout d’abord, il faut les mettre à leur place correct. Observez les trois couleurs d’un coin, prenez les deux couleurs autres que le jaune. Vous devez positionner ce coin au dessus des deux faces avec ces couleurs.</p>
      <div class="roofpig-container">
        <div class="roofpig" data-config="colored=U UFR U*/e U-|tweaks=F:Urf R:Fur U:Rfu|hover=none"></div>
      </div>
      <p>Le but est de placer tous les coins à leur endroit respectif, sans rien casser, et même si ces coins ne sont pas bien orienté. ( C’est à dire que le côté Jaune pointe vers le haut, ce sera la prochaine étape )</p>
      <p>La première étape est de chercher si vous avez un à sa bonne place sans oublier de garder la croix jaune bien orientée, afin que les bras de la croix reste connectés aux bonnes couleurs. Une fois que vous en trouvez un, tourner tout votre cube pour qu’il soit placé face à vous et à votre droite. Il vous suffit d'exécuter cette suite de mouvement jusqu'à ce que les quatre coin soit à leur bonne place.</p>
      <div class="roofpig-container">
        <div class="roofpig" data-config="colored=U U*/e U*/c U-|solved=UFR|alg=U R U' L' U R' U' L|speed=1000|flags=showalg|hover=none"></div>
        <div class="roofpig" data-config="colored=U U*/e U*/c U-|tweaks=F:Urf R:Fur U:Rfu F:Luf L:Ufl U:Flu B:Rub R:Ubr U:Bru|alg=U R U' L' U R' U' L|speed=850|flags=showalg|hover=none"></div>
      </div>
      <p>Si malheureusement vous n’avez aucun coin de bien positionné, vous pouvez simplement faire cette suite de mouvements depuis l’orientation que vous voulez, puis chercher le coin qui est maintenant résolu pour enchaîner sur la même méthode que précédemment.</p>
      <hr>
    </div>
    <div class="col-9 mx-auto text-justify">
      <h4 class="text-center font-weight-bold">Résoudre le cube ( orienter les coins )</h4>
      <p>Enfin, nous sommes à la dernière étape avant d’avoir résolu le cube complètement ! Si vous êtes arrivé à cette étape, vous pouvez déjà vous féliciter ! Vous êtes aller plus loin dans la résolution du Rubik’s Cube que la majorité de la population. Il est maintenant temps de finir cette leçon !</p>
      <p>Pour finir, il nous faut orienter les coins pour que leur côté Jaune pointe vers le haut. Cette étape est assez précise, ainsi, prenez autant de temps que vous le souhaitez quand vous allez commencer cette suite de mouvement. Positionner un coin mal orienté en face de vous à droite, puis commencer l’enchaînement en cyclant avec les coins non résolu.</p>
      <div class="roofpig-container">
        <div class="roofpig" data-config="colored=U U*/e U*/c U-|alg=R' D' R D R' D' R D U R' D' R D R' D' R D U R' D' R D R' D' R D U2|speed=800|flags=showalg|hover=none"></div>
      </div>
      <hr>
    </div>
    <div class="col-10 mx-auto text-center">
      <p class="font-weight-bold">Bravo ! Vous avez résolu le cube !</p>
      <p class="font-weight-bold">Si le cube n’est pas résolu à cette étape, essayez de trouver dans quelle étape vous êtes maintenant et recommencez à partir de ce moment là en regardant où vous ayez pu faire une erreur.</p>
    </div>
  </div>
</div>
