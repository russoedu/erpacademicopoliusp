/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package fakecorp.sessoes;

import javax.ejb.Remote;

/**
 *
 * @author jorge
 */
@Remote
public interface AtendimentoRemote {

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
