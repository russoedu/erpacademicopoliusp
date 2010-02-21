/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package br.com.grupo1.fakewebservice.remote;

import br.com.grupo1.fakewebservice.pojo.FornecimentoManager;
import org.springframework.beans.factory.annotation.Autowired;

/**
 *
 * @author jorge
 */
@javax.jws.WebService(endpointInterface="br.com.grupo1.fakewebservice.remote.WebService")
public class WebServiceImpl implements WebService{

    @Autowired
    private FornecimentoManager fornecimentoManager;

    public int soma(int parametroA, int parametroB) {
        this.fornecimentoManager.registrarConsumo(parametroA, parametroB);
        return parametroA + parametroB;
    }

}
