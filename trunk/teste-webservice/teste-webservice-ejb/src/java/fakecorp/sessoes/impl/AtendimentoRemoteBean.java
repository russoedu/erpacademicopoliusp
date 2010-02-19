/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package fakecorp.sessoes.impl;

import javax.ejb.Remote;

/**
 *
 * @author jorge
 */
@Remote
public interface AtendimentoRemoteBean {

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
