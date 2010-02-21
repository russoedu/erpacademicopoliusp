/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.grupo1.fakewebservice.entities;

import java.io.Serializable;
import java.util.Date;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Temporal;

/**
 *
 * @author jorge
 */
@Entity
public class RegistroFornecimento implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;
    private Integer parametroA;
    private Integer parametroB;
    @Temporal(javax.persistence.TemporalType.TIMESTAMP)
    private Date horario;

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Date getHorario() {
        return horario;
    }

    public void setHorario(Date horario) {
        this.horario = horario;
    }

    public Integer getParametroA() {
        return parametroA;
    }

    public void setParametroA(Integer parametroA) {
        this.parametroA = parametroA;
    }

    public Integer getParametroB() {
        return parametroB;
    }

    public void setParametroB(Integer parametroB) {
        this.parametroB = parametroB;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final RegistroFornecimento other = (RegistroFornecimento) obj;
        if (this.parametroA != other.parametroA && (this.parametroA == null || !this.parametroA.equals(other.parametroA))) {
            return false;
        }
        if (this.parametroB != other.parametroB && (this.parametroB == null || !this.parametroB.equals(other.parametroB))) {
            return false;
        }
        if (this.horario != other.horario && (this.horario == null || !this.horario.equals(other.horario))) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 3;
        hash = 67 * hash + (this.id != null ? this.id.hashCode() : 0);
        hash = 67 * hash + (this.parametroA != null ? this.parametroA.hashCode() : 0);
        hash = 67 * hash + (this.parametroB != null ? this.parametroB.hashCode() : 0);
        hash = 67 * hash + (this.horario != null ? this.horario.hashCode() : 0);
        return hash;
    }

    @Override
    public String toString() {
        return "br.com.grupo1.fakewebservice.entities.RegistroFornecimento[id=" + id + "]";
    }
}
