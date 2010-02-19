/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package fakecorp.sessoes;

import fakecorp.entidades.ChamadaAtendida;
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
public class Antendimento implements AntendimentoLocal {

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
