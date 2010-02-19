/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package fakecorp.sessoes;

import javax.ejb.Local;

/**
 *
 * @author jorge
 */
@Local
public interface AntendimentoLocal {

       /**
     * Esse método serve para a execução de uma soma remota para o teste do
     * webservice
     * @param parametroA
     *      númeto
     * @param parametroB
     *      número
     * @return
     *      soma dos números
     *
     */
    int soma(int parametroA, int parametroB);
    
}
