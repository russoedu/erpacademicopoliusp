/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package br.com.grupo1.fakewebservice.remote;

import javax.jws.WebMethod;

/**
 *
 * @author jorge
 */
@javax.jws.WebService
public interface WebService {

    @WebMethod(operationName="soma")
    public int soma(int parametroA, int parametroB);

}
