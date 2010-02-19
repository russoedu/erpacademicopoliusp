/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package fakecorp.sessoes.impl;

import fakecorp.entidades.ChamadaAtendida;
import fakecorp.sessoes.AtendimentoRemote;
import java.util.Date;
import javax.ejb.Stateless;
import javax.jws.WebService;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;

/**
 *
 * @author jorge
 */
@Stateless
@WebService
public class AtendimentoBean implements AtendimentoRemote {

    @PersistenceContext
    private EntityManager em;

    public int soma(int parametroA, int parametroB) {
        ChamadaAtendida ca = new ChamadaAtendida();
        ca.setDataAtendimento(new Date());
        ca.setParametroA(parametroA);
        ca.setParametroB(parametroB);

        em.persist(ca);

        return parametroA + parametroB;
    }

}
